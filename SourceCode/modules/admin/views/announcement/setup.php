<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\AnnouncementSetupForm */

$this->title = 'Cài Đặt Thông Báo';

?>

<?php if(Yii::$app->session->hasFlash('EnableAnnouncementSuccess')): ?>
	<div class="alert alert-success">Đã cập nhật!</div>
<?php elseif (Yii::$app->session->hasFlash('EnableAnnouncementFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'announcement-setup-form']) ?>
		<?= $form->field($model, 'enable')->checkbox() ?>
		<div class="form-group">
			<?= Html::submitButton('LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'announcement-button']) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- #announcement-setup-form -->		
	</div>
</div>