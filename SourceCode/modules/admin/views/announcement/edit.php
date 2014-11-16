<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AnnouncementForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Sửa Thông Báo | Quốc Bảo - Control Panel';
?>
<?php if(Yii::$app->session->hasFlash('EditAnnouncementSuccess')): ?>
	<div class="alert alert-success">Cập nhật thông báo thành công!</div>
<?php elseif (Yii::$app->session->hasFlash('EditAnnouncementFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật thông báo lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'edit-announcement-form']) ?>
			<?= $form->field($model, 'title') ?>
			<?= $form->field($model, 'modeId')->dropDownList(array('0' => 'Bình Thường', '1' => 'Quan Trọng')) ?>
			<?= $form->field($model, 'publish')->checkbox() ?>
			<?= $form->field($model, 'content') ?>
			<div class="form-group">
				<?= Html::submitButton('LƯU THÔNG BÁO', ['class' => 'btn btn-primary', 'name' => 'announcement-button']) ?>
			</div>	
		<?php ActiveForm::end() ?> <!-- / #edit-announcement-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->