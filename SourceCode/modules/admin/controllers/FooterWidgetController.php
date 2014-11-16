<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\FooterWidgetForm;
use app\models\Setting;

class FooterWidgetController extends Controller
{
	public function actionIndex() {
		$model = new FooterWidgetForm();
		
		$widgetEnable = Setting::findOne(['name' => 'widget_enable']);
		$widget1Title = Setting::findOne(['name' => 'widget_1_title']);
		$widget1Text = Setting::findOne(['name' => 'widget_1_text']);
		$widget2Title = Setting::findOne(['name' => 'widget_2_title']);
		$widget2Text = Setting::findOne(['name' => 'widget_2_text']);
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$widgetEnable->value = $model->enable;
			$widget1Title->value = $model->widget1Title;
			$widget1Text->value = $model->widget1Text;
			$widget2Title->value = $model->widget2Title;
			$widget2Text->value = $model->widget2Text;
			
			$saveAll = $widgetEnable->save() && 
						$widget1Title->save() && $widget1Text->save() && 
						$widget2Title->save() && $widget2Text->save();
			
			if ( $saveAll ) {
				Yii::$app->session->setFlash('ChangeWidgetSuccess');
			} else {
				Yii::$app->session->setFlash('ChangeWidgetFail');
			}
		}
		
		$model->enable = $widgetEnable->value;
		$model->widget1Title = $widget1Title->value;
		$model->widget1Text = $widget1Text->value;
		$model->widget2Title = $widget2Title->value;
		$model->widget2Text = $widget2Text->value;
		
		return $this->render('index', array('model' => $model));
	}
}