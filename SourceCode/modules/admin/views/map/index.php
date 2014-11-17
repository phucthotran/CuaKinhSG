<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Setting;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\MapForm */

$this->title = 'Bản Đồ';
$this->registerJsFile( 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', ['position' => \yii\web\View::POS_END] );
$this->registerJsFile( 'http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7', ['position' => \yii\web\View::POS_END] );
$this->registerJsFile( '/web/js/maplace-0.1.3.min.js', ['position' => \yii\web\View::POS_END] );
?>

<?php 
$maplaceScript = <<<EOT
	new Maplace({
			locations: [{ lat: {lat}, lon: {long}, zoom: 16 }],
			controls_on_map: false,
			show_infowindow: false,
			map_options: {
				scrollwheel: false
			}
	}).Load();
EOT;
?>

<?php

$mapLat = strval( Setting::findOne( ['name' => 'map_lat'] )->value );
$mapLong = strval( Setting::findOne( ['name' => 'map_long'] )->value );

$maplaceScript = str_replace( '{lat}', $mapLat, $maplaceScript );
$maplaceScript = str_replace( '{long}', $mapLong, $maplaceScript );

$this->registerJs( $maplaceScript, \yii\web\View::POS_READY, 'maplace' );
?>

<div class="panel panel-default">
	<div class="panel-body">
		<div style="height: 400px; margin-bottom: 30px;" id="gmap"></div>
	
		<?php $form = ActiveForm::begin( ['id' => 'map-form'] ) ?>
		<?= $form->field( $model, 'lat' ) ?>
		<?= $form->field( $model, 'long' ) ?>
		<div class="form-group">
			<?= Html::submitButton( 'LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'map-button'] ) ?>
		</div>
		<?php ActiveForm::end() ?> <!-- / #map-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->