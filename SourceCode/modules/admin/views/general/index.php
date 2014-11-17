<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\GeneralForm */

$this->title = 'Thông tin Website';

?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'general-form'] ); ?>
		<div class="panel panel-danger">
			<div class="panel-body">
			<?= $form->field( $model, 'maintenanceEnable' )->checkbox() ?>
			<?= $form->field( $model, 'maintenanceMessage', array(
				'inputOptions' => array( 'placeholder' => $model->getAttributeLabel('maintenanceMessage') )
				) ) ?>
			</div>
		</div>
		<div class="panel panel-danger">
			<div class="panel panel-body">
				<?= $form->field( $model, 'breadcrumbEnable' )->checkbox() ?>
				<ul class="breadcrumb">					
					<li><a href="#">TRANG CHỦ</a></li>
					<li class="active">LIÊN HỆ</li>
				</ul>						
			</div>
		</div>
		<div class="panel panel-danger">
			<div class="panel-body">
			<?= $form->field( $model, 'websiteName' ) ?>
			<?= $form->field( $model, 'websiteTitle' ) ?>
			<?= $form->field( $model, 'corporationName' ) ?>
			<?= $form->field( $model, 'corporationAddress') ?>
			<?= $form->field( $model, 'corporationEmail' ) ?>
			<?= $form->field( $model, 'corporationPhone' ) ?>
			</div>
		</div>
		<div class="form-group">
			<?= Html::submitButton( 'LƯU CÀI ĐẶT', array( 'class' => 'btn btn-primary', 'name' => 'general-button' ) ) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- / #general-form -->
	</div>
</div>