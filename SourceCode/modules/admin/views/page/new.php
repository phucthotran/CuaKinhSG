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
/* @var $model app\modules\admin\models\PageForm */
	
$this->title = 'Thêm Trang';

$this->registerJsFile( '/web/js/ckeditor/ckeditor.js', ['position' => \yii\web\View::POS_END] );
$this->registerJs( $script, \yii\web\View::POS_READY );
?>

<div class="panel panel-default">
	<div class="panel-body">		
		<?php $form = ActiveForm::begin( ['id' => 'new-page-form'] ); ?>
		<?= $form->field( $model, 'title' ) ?>
		<?= $form->field( $model, 'url' ) ?>
		<?= $form->field( $model, 'keywords' ) ?>
		<?= $form->field( $model, 'sidebarSupport' )->checkbox() ?>
		<?= $form->field( $model, 'publish' )->checkbox() ?>
		<?= $form->field( $model, 'content' )->textarea( ['rows' => 20, 'class' => 'ckeditor'] ) ?>
		<div class="form-group">
			<?= Html::submitButton( 'THÊM TRANG', ['class' => 'btn btn-primary', 'name' => 'page-button'] ) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- #new-page-form -->		
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->