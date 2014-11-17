<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\NavbarForm;
use app\models\Setting;
use app\models\Page;

class NavbarController extends Controller
{
	public function actionIndex() {
		$model = new NavbarForm();
		$navbarItems = Setting::findOne( ['name' => 'navbar_items'] );
		$pages = Page::find()->where( ['publish' => '1'] )->all();
		
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
			$navbarItems->value = implode( ';', $model->items );
						
			if ( $navbarItems->save() ) {
				Yii::$app->session->setFlash( 'Done' );
			} else {
				Yii::$app->session->setFlash( 'Fail' );
			}
			
			return $this->refresh();
		}
		
		$model->items = explode( ';', strval( $navbarItems->value ) );
		$pagesArray = array();
		
		foreach( $pages as $page ) {
			$pagesArray[ $page->id ] = $page->title;
		}
		
		return $this->render( 'index', 
				array(
					'model' => $model, 
					'pages' => $pagesArray	
				) );
	}
}