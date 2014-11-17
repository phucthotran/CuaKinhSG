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
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],        	
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {    	
    	if ( Setting::findOne(['name' => 'homepage_id']) ) {
    		$homepageId = intval( Setting::findOne(['name' => 'homepage_id'])->value );
    		
    		if ( $homepageId != 0 ) {
    			$page = Page::findOne($homepageId);
    			
    			return $this->actionPage($page->url);
    		}
    	}
    	
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
         
        if( Setting::findOne(['name' => 'general_web_title']) != null )
        	$websiteTitle = strval( Setting::findOne(['name' => 'general_web_title'])->value );
         
        if( Setting::findOne(['name' => 'general_corp_name']) != null )
        	$corporationName = strval( Setting::findOne(['name' => 'general_corp_name'])->value );
         
        if( Setting::findOne(['name' => 'general_corp_address']) != null )
        	$corporationAddress = strval( Setting::findOne(['name' => 'general_corp_address'])->value );
        
        if( Setting::findOne(['name' => 'general_corp_email']) != null )
        	$corporationEmail = strval( Setting::findOne(['name' => 'general_corp_email'])->value );
        
        if( Setting::findOne(['name' => 'general_corp_phone']) != null )
        	$corporationPhone = strval( Setting::findOne(['name' => 'general_corp_phone'])->value );
        
        if ($model->load(Yii::$app->request->post()) && $model->contact($corporationEmail)) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        
        return $this->render('contact', [
            'model' => $model,
        	'websiteTitle' => $websiteTitle,
        	'corporationName' => $corporationName,
        	'corporationAddress' => $corporationAddress,
        	'corporationPhone' => $corporationPhone
        ]);        
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionPage( $url )
    {
    	$page = Page::findOne(['url' => $url]);

    	if( $page == null )
    		throw new NotFoundHttpException;
   	
    	return $this->render('page', [ 'page' => $page ]);
    }

}
