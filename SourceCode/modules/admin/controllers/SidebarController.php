<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sidebar;
use app\modules\admin\models\SidebarForm;
use yii\web\MethodNotAllowedHttpException;
use yii\web\BadRequestHttpException;

class SidebarController extends Controller
{
	public function beforeAction( $action ) {
		switch ( $action->id ) {
			case 'remove':
			case 'publish':
			case 'priority':
				if ( !Yii::$app->request->isPost ) {
					throw new MethodNotAllowedHttpException;
				}
		}
	
		return true;
	}
	
	public function actionIndex() {
		$sidebars = Sidebar::find()->asArray()->all();
		
		return $this->render( 'index', array( 'sidebars' => $sidebars ) );
	}	
	
	public function actionNew() {
		$model = new SidebarForm();
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$newSidebar = new Sidebar();
			$newSidebar->title = $model->title;
			$newSidebar->body = $model->body;
			$newSidebar->priorityMode = $model->priorityMode;
			$newSidebar->position = $model->position;
			$newSidebar->templateMode = $model->templateMode;
			$newSidebar->publish = $model->publish;
				
			if ( $newSidebar->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
				
			return $this->refresh();
		}
		
		return $this->render( 'new', array( 'model' => $model ) );
	}
	
	public function actionEdit( $id ) {
		$model = new SidebarForm();
		$sidebar = Sidebar::findOne( $id );
		
		if ( $model->load( Yii::$app->request->post() ) ) {
			//If sidebar position not change, not validate 'position' again
			$validate = $sidebar->position == $model->position ?
												$model->validate( ['title', 'body', 'priorityMode', 'templateMode', 'publish'] ) :
												$model->validate();
			
			if ( $validate ) {
				$sidebar->title = $model->title;
				$sidebar->body = $model->body;
				$sidebar->priorityMode = $model->priorityMode;
				$sidebar->position = $model->position;
				$sidebar->templateMode = $model->templateMode;
				$sidebar->publish = $model->publish;
					
				if ( $sidebar->save() ) {
					Yii::$app->session->setFlash( 'Done' );
				} else {
					Yii::$app->session->setFlash( 'Fail' );
				}
					
				return $this->refresh();
			}
		}
		
		$model->title = $sidebar->title;
		$model->body = $sidebar->body;
		$model->priorityMode = $sidebar->priorityMode;
		$model->position = $sidebar->position;
		$model->templateMode = $sidebar->templateMode;
		$model->publish = $sidebar->publish;
		
		return $this->render('edit', array( 'model' => $model ) );
	}
	
	public function actionRemove( $id ) {		
		$sidebar = Sidebar::findOne( $id );
		
		if ( is_null( $sidebar ) ) {
			throw new NotFoundHttpException;
		}
		
		if ( !$sidebar->delete() ) {
			throw new BadRequestHttpException;
		}
	}
	
	public function actionPriority( $id ) {		
		$sidebar = Sidebar::findOne( $id );
	
		if ( is_null( $sidebar ) ) {
			throw new NotFoundHttpException;
		}
	
		$priority = $sidebar->priorityMode;
		$sidebar->priorityMode = $priority == 1 ? 0 : 1; //If sidebar mode is normal switch to important
	
		if ( !$sidebar->save() ) {
			throw new BadRequestHttpException;
		}
	}
	
	public function actionPublish( $id ) {		
		$sidebar = Sidebar::findOne( $id );
		
		if ( is_null( $sidebar ) ) {
			throw new NotFoundHttpException;
		}
		
		$publish = $sidebar->publish;
		$sidebar->publish = $publish == 1 ? 0 : 1; //If sidebar published, unpublish and otherwise
		
		if ( !$sidebar->save() ) {
			throw new BadRequestHttpException;
		}
	}
}