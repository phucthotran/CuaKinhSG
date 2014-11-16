<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\GeneralForm */

$this->title = 'Thông tin Website | Quốc Bảo - Control Panel';

?>

<?php if(Yii::$app->session->hasFlash('ChangeGeneralSuccess')): ?>
	<div class="alert alert-success">Đã cập nhật thông tin Website!</div>
<?php elseif (Yii::$app->session->hasFlash('ChangeGeneralFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật thông tin Website lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'genral-form']); ?>
		<?= $form->field($model, 'maintenanceEnable')->checkbox() ?>
		<?= $form->field($model, 'maintenanceMessage', array(
			'inputOptions' => array('placeholder' => $model->getAttributeLabel('maintenanceMessage'))
			)) ?>
		<?= $form->field($model, 'websiteName') ?>
		<?= $form->field($model, 'websiteTitle') ?>
		<?= $form->field($model, 'corporationName') ?>
		<?= $form->field($model, 'corporationAddress') ?>
		<?= $form->field($model, 'corporationEmail') ?>
		<?= $form->field($model, 'corporationPhone') ?>
		<div class="form-group">
			<?= Html::submitButton('LƯU CÀI ĐẶT', array('class' => 'btn btn-primary', 'name' => 'general-button')) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- / #general-form -->
	</div>
</div>