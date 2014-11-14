<?php

$script = <<<EOT
	CKEDITOR.instances['pageform-content'].on('change', function(){
		$('#pageform-content').text(CKEDITOR.instances['pageform-content'].getData());
	});

	$('#pageform-title').on('keypress, change', function(){
		var title = $('#pageform-title').val().toLowerCase();
		var url = S(title).escapeHTML().latinise().dasherize().s;
		var keywords = S(title).escapeHTML().latinise().s + ', ' + title;
		
		$('#pageform-url').val(url);
		$('#pageform-keywords').val(keywords);
	});
EOT;
		
?>

<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
	
$this->title = 'Thêm Trang | Quốc Bảo - Control Panel';

$this->registerJsFile('/web/js/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_END]);
$this->registerJs($script, \yii\web\View::POS_READY);
?>

<?php if(Yii::$app->session->hasFlash('addPageSuccess')): ?>
	<div class="alert alert-success">Thêm trang mới thành công!</div>
<?php elseif (Yii::$app->session->hasFlash('addPageFail')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p>Không thể thêm trang mới lúc này!</p>
	</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">		
		<?php $form = ActiveForm::begin(['id' => 'new-page-form']); ?>
		<?= $form->field($model, 'title') ?>
		<?= $form->field($model, 'url') ?>
		<?= $form->field($model, 'keywords') ?>
		<?= $form->field($model, 'publish')->checkbox() ?>
		<?= $form->field($model, 'content')->textarea(['rows' => 20, 'class' => 'ckeditor']) ?>
		<div class="form-group">
			<?= Html::submitButton('THÊM TRANG', ['class' => 'btn btn-primary', 'name' => 'page-button']) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- #new-page-form -->		
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->