<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\FooterWidgetForm */

$this->title = 'Cài Đặt Footer Widget';
?>

<div class="panel panel-default">
<div class="panel-body">
	<?php $form = ActiveForm::begin( ['id' => 'footer-widget-form'] ) ?>
		<?= $form->field( $model, 'enable' )->checkbox() ?>
		<div class="col-md-6">		
			<?= $form->field( $model, 'widget1Title' ) ?>
			<?= $form->field( $model, 'widget1Text' )->textarea( ['rows' => '10'] ) ?>
			
		</div>
		<div class="col-md-6">
			<?= $form->field( $model, 'widget2Title' ) ?>
			<?= $form->field( $model, 'widget2Text' )->textarea( ['rows' => '10'] ) ?>
		</div>
		<div class="form-group">
			<?= Html::submitButton( 'LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'widget-button'] ) ?>
		</div>	
	<?php ActiveForm::end() ?> <!-- / #footer-widget-form -->
</div> <!-- / .panel-body -->