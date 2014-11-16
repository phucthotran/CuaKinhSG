<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AnnouncementForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Thêm Thông Báo';
?>
<?php if(Yii::$app->session->hasFlash('AddAnnouncementSuccess')): ?>
	<div class="alert alert-success">Thêm thông báo mới thành công!</div>
<?php elseif (Yii::$app->session->hasFlash('AddAnnouncementFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể thêm thông báo mới lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'new-announcement-form']) ?>
			<?= $form->field($model, 'title') ?>
			<?= $form->field($model, 'modeId')->dropDownList(array('0' => 'Bình Thường', '1' => 'Quan Trọng')) ?>
			<?= $form->field($model, 'publish')->checkbox() ?>
			<?= $form->field($model, 'content') ?>
			<div class="form-group">
				<?= Html::submitButton('THÊM THÔNG BÁO', ['class' => 'btn btn-primary', 'name' => 'announcement-button']) ?>
			</div>	
		<?php ActiveForm::end() ?> <!-- / #new-announcement-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->