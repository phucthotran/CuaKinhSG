<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\AnnouncementForm */

$this->title = 'Thêm Thông Báo';
?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'new-announcement-form'] ) ?>
			<?= $form->field( $model, 'title' ) ?>
			<?= $form->field( $model, 'modeId' )->dropDownList( array('0' => 'Bình Thường', '1' => 'Quan Trọng') ) ?>
			<?= $form->field( $model, 'publish' )->checkbox() ?>
			<?= $form->field( $model, 'content' ) ?>
			<div class="form-group">
				<?= Html::submitButton( 'THÊM THÔNG BÁO', ['class' => 'btn btn-primary', 'name' => 'announcement-button'] ) ?>
			</div>	
		<?php ActiveForm::end() ?> <!-- / #new-announcement-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->