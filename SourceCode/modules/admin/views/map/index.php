<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Bản Đồ';

?>

<?php if(Yii::$app->session->hasFlash('ChangeMapSuccess')): ?>
	<div class="alert alert-success">Đã cập nhật bản đồ!</div>
<?php elseif (Yii::$app->session->hasFlash('ChangeMapFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật bản đồ lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'map-form']) ?>
		<?= $form->field($model, 'lat') ?>
		<?= $form->field($model, 'long') ?>
		<div class="form-group">
			<?= Html::submitButton('LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'map-button']) ?>
		</div>
		<?php ActiveForm::end() ?> <!-- / #map-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->