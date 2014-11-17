<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\AnnouncementSetupForm */

$this->title = 'Cài Đặt Thông Báo';

?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'announcement-setup-form'] ) ?>
		<?= $form->field( $model, 'enable' )->checkbox() ?>
		<div class="form-group">
			<?= Html::submitButton( 'LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'announcement-button'] ) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- #announcement-setup-form -->		
	</div>
</div>