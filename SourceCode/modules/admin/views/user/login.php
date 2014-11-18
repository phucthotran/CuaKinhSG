<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Đăng Nhập';
?>
<div class="center-block">	
	<?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
		<?= $form->field( $model, 'username' ) ?>
		<?= $form->field( $model, 'password' )->passwordInput() ?>
		<?= $form->field( $model, 'rememberMe' )->checkbox() ?>
		<div class="form-group">
			<?= Html::submitButton('ĐĂNG NHẬP', [ 'class' => 'btn btn-primary', 'name' => 'login-button' ] ) ?>
		</div>
	<?php ActiveForm::end() ?> <!-- / #login-form -->
</div>