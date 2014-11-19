<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\SidebarForm */

$this->title = 'Sửa Sidebar';
?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'new-sidebar-form'] ) ?>
			<?= $form->field( $model, 'title' ) ?>
			<?= $form->field( $model, 'priorityMode' )->dropDownList( array('0' => 'Bình Thường', '1' => 'Quan Trọng') ) ?>
			<?= $form->field( $model, 'templateMode' )->dropDownList( array('0' => 'Tiêu Chuẩn', '1' => 'Tự Do') ) ?>
			<?= $form->field( $model, 'position' ) ?>
			<?= $form->field( $model, 'publish' )->checkbox() ?>
			<?= $form->field( $model, 'body' )->textarea( ['rows' => '10'] ) ?>
			<div class="form-group">
				<?= Html::submitButton( 'LƯU SIDEBAR', ['class' => 'btn btn-primary', 'name' => 'sidebar-button'] ) ?>
			</div>	
		<?php ActiveForm::end() ?> <!-- / #new-sidebar-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->