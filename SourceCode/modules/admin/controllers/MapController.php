<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\MapForm;
use app\models\Setting;

class MapController extends Controller
{
	public function actionIndex() {
		$model = new MapForm();
		$mapLat = Setting::findOne( ['name' => 'map_lat'] );
		$mapLong = Setting::findOne( ['name' => 'map_long'] );
		
		if ( $model->load(Yii::$app->request->post() ) && $model->validate() ) {
			$mapLat->value = $model->lat;
			$mapLong->value = $model->long;
			
			if ( $mapLat->save() && $mapLong->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
			
			return $this->refresh();
		}
		
		$model->lat = $mapLat->value;
		$model->long = $mapLong->value;
		
		return $this->render('index', array( 'model' => $model ) );
	}
}