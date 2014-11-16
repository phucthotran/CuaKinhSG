<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\GeneralForm;
use app\models\Setting;

class GeneralController extends Controller
{
	public function actionIndex()
	{
		$model = new GeneralForm();
		
		$maintenanceEnable = Setting::findOne(['name' => 'general_maintenance_enable']);
		$maintenanceMessage = Setting::findOne(['name' => 'general_maintenance_message']);
		$breadcrumbEnable = Setting::findOne(['name' => 'general_breadcrumb_enable']);
		$websiteName = Setting::findOne(['name' => 'general_web_name']);
		$websiteTitle = Setting::findOne(['name' => 'general_web_title']);
		$corporationName = Setting::findOne(['name' => 'general_corp_name']);
		$corporationAddress = Setting::findOne(['name' => 'general_corp_address']);
		$corporationEmail = Setting::findOne(['name' => 'general_corp_email']);
		$corporationPhone = Setting::findOne(['name' => 'general_corp_phone']);
		
		if( $model->load(Yii::$app->request->post()) && $model->validate() )
		{
			$maintenanceEnable->value = $model->maintenanceEnable;
			$maintenanceMessage->value = $model->maintenanceMessage;
			$breadcrumbEnable->value = $model->breadcrumbEnable;
			$websiteName->value = $model->websiteName;
			$websiteTitle->value = $model->websiteTitle;
			$corporationName->value = $model->corporationName;
			$corporationAddress->value = $model->corporationAddress;
			$corporationEmail->value = $model->corporationEmail;
			$corporationPhone->value = $model->corporationPhone;
			
			$save_all = $maintenanceEnable->save() && $maintenanceMessage->save() && 
						$breadcrumbEnable->save() &&
						$websiteName->save() && $websiteTitle->save() && 
						$corporationName->save() && $corporationAddress->save() && $corporationEmail->save() && $corporationPhone->save();			

			if( $save_all )
				Yii::$app->session->setFlash('ChangeGeneralSuccess');
			else 
				Yii::$app->session->setFlash('ChangeGeneralFail');

			return $this->refresh();
		}

		$model->maintenanceEnable = $maintenanceEnable->value;
		$model->maintenanceMessage = $maintenanceMessage->value;
		$model->breadcrumbEnable = $breadcrumbEnable->value;
		$model->websiteName = $websiteName->value;
		$model->websiteTitle = $websiteTitle->value;
		$model->corporationName = $corporationName->value;
		$model->corporationAddress = $corporationAddress->value;
		$model->corporationEmail = $corporationEmail->value;
		$model->corporationPhone = $corporationPhone->value;

		return $this->render('index', array('model' => $model));
	}
}