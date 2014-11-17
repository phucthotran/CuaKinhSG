<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\LoginForm;

class UserController extends Controller
{
	public function init() {
		parent::init();
		
		$this->layout = 'default.php';
	}
	
	public function actionIndex() {
		return $this->actionLogin();
	}	
	
	public function actionLogin() {    	
    	if ( !Yii::$app->user->isGuest ) {
    		return $this->redirect('/web/admin');
    	}    	
    	
    	$model = new LoginForm();
    	
    	if ( $model->load( Yii::$app->request->post() ) && $model->login() ) {
    		return $this->goBack();
    	}
    	
    	return $this->render( 'login', array( 'model' => $model ) );    	
    }
    
    public function actionLogout() {
    	Yii::$app->user->logout();
    	
    	return $this->goHome();
    }
}