<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Admin extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->layout = 'admin.php';
    }
    
    public function behaviors() {
    	return array(
    		'access' =>	array(
    			'class' => AccessControl::className(),
    			'rules' => array(
    				[
    					'allow' => true,
    					'roles' => ['@'],
    				],
    				[
    					'allow' => true,
    					'actions' => ['login'],
    					'roles' => ['?'],
    				],
    			),
    		),
    	);
    }
}
