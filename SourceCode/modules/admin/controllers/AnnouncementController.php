<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Announcement;
use app\models\Setting;
use app\modules\admin\models\AnnouncementSetupForm;
use app\modules\admin\models\AnnouncementForm;
use yii\web\NotFoundHttpException;
use yii\bootstrap\ActiveForm;
use yii\web\MethodNotAllowedHttpException;
use yii\web\BadRequestHttpException;

class AnnouncementController extends Controller
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
		$announments = Announcement::find()->asArray()->all();
		
		return $this->render( 'index', array('announcements' => $announments) );
	}
	
	public function actionSetup() {
		$model = new AnnouncementSetupForm();
		$status = Setting::findOne( ['name' => 'announcement_enable'] );
	
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$status->value = $model->enable;
				
			if ( $status->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
				
			return $this->refresh();
		}
	
		$model->enable = $status->value;
	
		return $this->render( 'setup', array( 'model' => $model ) );
	}
	
	public function actionNew() {
		$model = new AnnouncementForm();
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$newAnnouncement = new Announcement();			
			$newAnnouncement->title = $model->title;
			$newAnnouncement->modeId = $model->modeId;
			$newAnnouncement->publish = $model->publish;
			$newAnnouncement->content = $model->content;
			
			if ( $newAnnouncement->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
			
			return $this->refresh();
		}
		
		return $this->render( 'new', array( 'model' => $model ) );
	}
	
	public function actionEdit( $id ) {
		$model = new AnnouncementForm();
		$announcement = Announcement::findOne( $id );
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$announcement->title = $model->title;
			$announcement->modeId = $model->modeId;
			$announcement->publish = $model->publish;
			$announcement->content = $model->content;
			
			if ( $announcement->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
			
			return $this->refresh();
		}

		$model->title = $announcement->title;
		$model->modeId = $announcement->modeId;
		$model->publish = $announcement->publish;
		$model->content = $announcement->content;
		
		return $this->render('edit', array( 'model' => $model ) );
	}
	
	public function actionRemove( $id ) {	
		$announcement = Announcement::findOne( $id );
		
		if ( is_null( $announcement ) ) {
			throw new NotFoundHttpException;
		}
		
		if ( !$announcement->delete() ) {
			throw new BadRequestHttpException;
		}
	}
	
	public function actionPriority( $id ) {		
		$announcement = Announcement::findOne( $id );
		
		if ( is_null( $announcement ) ) {
			throw new NotFoundHttpException;
		}
		
		$priority = $announcement->modeId;
		$announcement->modeId = $priority == 1 ? 0 : 1; //If announcement mode is normal switch to important
		
		if ( !$announcement->save() ) {
			throw new BadRequestHttpException;
		}
	}
	
	public function actionPublish( $id ) {		
		$announcement = Announcement::findOne( $id );
		
		if ( is_null( $announcement ) ) {
			throw new NotFoundHttpException;
		}
		
		$publish = $announcement->publish;
		$announcement->publish = $publish == 1 ? 0 : 1; //If announcement published, unpublish and otherwise
		
		if ( !$announcement->save() ) {
			throw new BadRequestHttpException;
		}		
	}
}