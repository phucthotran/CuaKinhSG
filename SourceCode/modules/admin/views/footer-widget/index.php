<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FooterWidgetForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Cài Đặt Footer Widget | Quốc Bảo - Control Panel';
?>
<?php if(Yii::$app->session->hasFlash('ChangeWidgetSuccess')): ?>
	<div class="alert alert-success">Cập nhật Footer Widget thành công!</div>
<?php elseif (Yii::$app->session->hasFlash('ChangeWidgetFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật Footer Widget lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
<div class="panel-body">
	<?php $form = ActiveForm::begin(['id' => 'footer-widget-form']) ?>
		<?= $form->field($model, 'enable')->checkbox() ?>
		<div class="col-md-6">		
			<?= $form->field($model, 'widget1Title') ?>
			<?= $form->field($model, 'widget1Text')->textarea(['rows' => '10']) ?>
			
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'widget2Title') ?>
			<?= $form->field($model, 'widget2Text')->textarea(['rows' => '10']) ?>
		</div>
		<div class="form-group">
			<?= Html::submitButton('LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'widget-button']) ?>
		</div>	
	<?php ActiveForm::end() ?> <!-- / #footer-widget-form -->
</div> <!-- / .panel-body -->