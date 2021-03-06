<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Page;
use app\modules\admin\models\PageForm;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use app\models\Setting;
use yii\web\MethodNotAllowedHttpException;

class PageController extends Controller
{
	public function beforeAction( $action ) {		
		switch ( $action->id ) {
			case 'remove':
			case 'publish':
			case 'homepage':
			case 'sidebar':
				if ( !Yii::$app->request->isPost ) {
					throw new MethodNotAllowedHttpException;
				}
		}
		
		return true;
	}
	
    public function actionIndex() {
    	$pages = Page::find()->asArray()->all();
    	
        return $this->render( 'index', array( 'pages' => $pages ) );
    }
    		
    public function actionNew() {    	
    	$model = new PageForm();    	

    	if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
    		$newPage = new Page();
    		$newPage->title = $model->title;
    		$newPage->url = $model->url;
    		$newPage->keywords = $model->keywords;
    		$newPage->sidebarSupport = $model->sidebarSupport;
    		$newPage->publish = $model->publish;
    		$newPage->content = $model->content;
    		
    		if( $newPage->save() ) {
    			Yii::$app->session->setFlash( 'Done' );
    		} else {
    			Yii::$app->session->setFlash( 'Fail' );
    		}
    		
    		return $this->refresh();
    	}    	
    	
    	return $this->render('new', array( 'model' => $model ) );
    }

    public function actionEdit( $id ) {
    	$model = new PageForm();
    	$page = Page::findOne( $id );
    	
    	if ( $page == null ) {
    		throw new NotFoundHttpException;
    	}

    	if ( $model->load( Yii::$app->request->post() ) )	{
    		//If page url not change, not validate 'url' again
    		$validate = $page->url == $model->url ? 
    												$model->validate( ['title', 'keywords', 'sidebarSupport', 'publish', 'content'] ) : 
    												$model->validate();
    		
    		if ( $validate ) {
	    		$page->title = $model->title;
	    		$page->url = $model->url;
	    		$page->keywords = $model->keywords;
	    		$page->sidebarSupport = $model->sidebarSupport;
	    		$page->publish = $model->publish;
	    		$page->content = $model->content;
	    		
	    		if( $page->save() ) {
	    			Yii::$app->session->setFlash( 'Done' );
	    		} else {
	    			Yii::$app->session->setFlash( 'Fail' );
	    		}
	    		
	    		return $this->refresh();
    		}
    	}

    	$model->title = $page->title;
    	$model->url = $page->url;
    	$model->keywords = $page->keywords;
    	$model->sidebarSupport = $page->sidebarSupport;
    	$model->publish = $page->publish;
    	$model->content = $page->content;
    	
    	return $this->render('edit', array( 'model' => $model ) );
    }
    
    public function actionRemove( $id ) {    	
    	$page = Page::findOne( $id );
    	
    	if ( is_null( $page ) ) {
    		throw new NotFoundHttpException;
    	}
		
    	if ( !$page->delete() ) {
    		throw new BadRequestHttpException;
    	}
    }
    
    public function actionPublish( $id ) {    	
    	$page = Page::findOne( $id );
    	
    	if ( is_null( $page ) ) {
    		throw new NotFoundHttpException;
    	}
    	
    	$publish = $page->publish;
    	$page->publish = $publish == 1 ? 0 : 1; //If page published, unpublish and otherwise
    	
    	if ( !$page->save() ) {
    		throw new BadRequestHttpException;
    	}
    }
    
    public function actionHomepage( $id ) {    	
    	$homepage = Setting::findOne( ['name' => 'homepage_id'] );

    	if ( is_null( $homepage ) ) {
    		throw new BadRequestHttpException;
    	}
    	
    	$homepage->value = $id;
    	
    	if ( !$homepage->save() ) {
    		throw new BadRequestHttpException;
    	}
    }
    
    public function actionSidebar( $id ) {    	
    	$page = Page::findOne( $id );
    	
    	if ( is_null( $page ) ) {
    		throw new NotFoundHttpException;
    	}
    	
    	$sidebarSupport = $page->sidebarSupport;
    	$page->sidebarSupport = $sidebarSupport == 1 ? 0 : 1; //If page has been support sidebar, unsupport and otherwise
    	
    	if ( !$page->save() ) {
    		throw new BadRequestHttpException;
    	}
    }
}
