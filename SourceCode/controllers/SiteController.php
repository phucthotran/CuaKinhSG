<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Page;
use app\models\Setting;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
	public function beforeAction( $action ) {
		$maintenanceEnable = Setting::findOne( ['name' => 'general_maintenance_enable'] )->value;
		
		if ( $action->id == 'maintenance' ) {
			return true;
		}
		
		if ( $maintenanceEnable ) {			
			$this->redirect( Yii::$app->urlManager->createUrl( 'site/maintenance' ) );		
			
			return false;
		}
		
		return true;
	}
	
    public function actions() {
        return array(
            'error' => array(
                'class' => 'yii\web\ErrorAction',
            ),
            'captcha' => array(
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ),
        );
    }

    public function actionIndex() {    	
    	$homepageId = intval( Setting::findOne( ['name' => 'homepage_id'] )->value );
    		
    	if ( $homepageId != 0 ) {
    		$page = Page::findOne( $homepageId );
    			
    		return $this->actionPage( $page->url );
    	}    	
    	
        return $this->render( 'index' );
    }

    public function actionContact() {
        $model = new ContactForm();
        
        //Get some basic info
        $websiteTitle = strval( Setting::findOne( ['name' => 'general_web_title'] )->value );         
        $corporationName = strval( Setting::findOne( ['name' => 'general_corp_name'] )->value );         
        $corporationAddress = strval( Setting::findOne( ['name' => 'general_corp_address'] )->value );        
        $corporationEmail = strval( Setting::findOne( ['name' => 'general_corp_email'] )->value );        
        $corporationPhone = strval( Setting::findOne( ['name' => 'general_corp_phone'] )->value );
        
        //Check if request is POST and send mail done
        if ($model->load(Yii::$app->request->post()) && $model->contact($corporationEmail)) {
            Yii::$app->session->setFlash('Done');

            return $this->refresh();
        }
        
        //GET
        return $this->render( 'contact', array(
            'model' => $model,
        	'websiteTitle' => $websiteTitle,
        	'corporationName' => $corporationName,
        	'corporationAddress' => $corporationAddress,
        	'corporationPhone' => $corporationPhone,
        	) );        
    }
    
    public function actionPage( $url ) {
    	$page = Page::findOne( ['url' => $url] );

    	if( $page == null ) {
    		throw new NotFoundHttpException;
    	}
   	
    	return $this->render( 'page', array( 'page' => $page, 'sidebarSupport' => $page->sidebarSupport ) );
    }
    
    public function actionMaintenance() {
    	$maintenanceMessage = Setting::findOne( ['name' => 'general_maintenance_message'] )->value;
    	
    	return $this->render( 'maintenance', array( 'message' => $maintenanceMessage ) );
    }

}
