<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\NavbarForm */
?>

<?php 
$css = <<<EOT
	#navbarform-items {
		border: 1px solid #dedede;
		padding: 5px;
		border-radius: 3px;
		margin-top: 10px;
	}

	#navbarform-items .checkbox {
		border-bottom: 1px solid #ccc !important;		
		padding: 5px !important;
		margin: 5px !important;
	}
EOT;

$this->registerCss($css, array('position' => \yii\web\View::POS_HEAD));
?>

<?php if(Yii::$app->session->hasFlash('Done')): ?>
	<div class="alert alert-success">Đã cập nhật thông tin thành công!</div>
<?php elseif (Yii::$app->session->hasFlash('Fail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể cập nhật thông tin lúc này!!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'navbar-form']) ?>
			<?= $form->field($model, 'items')->checkboxList($pages) ?>
			<div class="form-group">
				<?= Html::submitButton('LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'navbar-button']) ?>				
			</div>
		<?php ActiveForm::end() ?> <!-- / #navbar-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->