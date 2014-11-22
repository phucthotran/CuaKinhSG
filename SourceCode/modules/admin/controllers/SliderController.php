<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Slider;
use app\models\Setting;
use app\modules\admin\models\SliderSetupForm;
use app\modules\admin\models\SliderForm;
use yii\web\BadRequestHttpException;
use yii\web\MethodNotAllowedHttpException;

class SliderController extends Controller
{
	public function beforeAction( $action ) {
		switch ( $action->id ) {
			case 'remove':
			case 'publish':
				if ( !Yii::$app->request->isPost ) {
					throw new MethodNotAllowedHttpException;
				}
		}
	
		return true;
	}
	
	public function actionIndex() {
		$sliders = Slider::find()->asArray()->all();
		
		return $this->render( 'index', array( 'sliders' => $sliders ) );
	}
	
	public function actionSetup() {
		$model = new SliderSetupForm();
		
		$status = Setting::findOne( ['name' => 'slider_enable'] );
		
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
		$model = new SliderForm();
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$newSlider = new Slider();
			$newSlider->imageLink = $model->imageLink;
			$newSlider->caption = $model->caption;
			$newSlider->link = $model->link;
			$newSlider->publish = $model->publish;			
				
			if ( $newSlider->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
				
			return $this->refresh();
		}
		
		return $this->render( 'new', array( 'model' => $model ) );
	}
	
	public function actionEdit( $id ) {
		$model = new SliderForm();
		$slider = Slider::findOne( $id );
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$slider->imageLink = $model->imageLink;
			$slider->caption = $model->caption;
			$slider->link = $model->link;
			$slider->publish = $model->publish;
				
			if ( $slider->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
				
			return $this->refresh();
		}
		
		$model->imageLink = $slider->imageLink;
		$model->caption = $slider->caption;
		$model->link = $slider->link;
		$model->publish = $slider->publish;
		
		return $this->render('edit', array( 'model' => $model ) );
	}
	
	public function actionRemove( $id ) {
		$slider = Slider::findOne( $id );
		
		if ( is_null( $slider ) ) {
			throw new NotFoundHttpException;
		}
		
		if ( !$slider->delete() ) {
			throw new BadRequestHttpException;
		}
	}
	
	public function actionPublish( $id ) {
		$slider = Slider::findOne( $id );
		
		if ( is_null( $slider ) ) {
			throw new NotFoundHttpException;
		}
		
		$publish = $slider->publish;
		$slider->publish = $publish == 1 ? 0 : 1; //If slider published, unpublish and otherwise
		
		if ( !$slider->save() ) {
			throw new BadRequestHttpException;
		}
	}
}