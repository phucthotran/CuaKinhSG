<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\SliderForm */

$this->title = 'Sửa Slider';
?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'new-slider-form'] ) ?>
			<?= $form->field( $model, 'imageLink' ) ?>
			<?= $form->field( $model, 'caption' ) ?>
			<?= $form->field( $model, 'link' ) ?>
			<?= $form->field( $model, 'publish' )->checkbox() ?>
			<div class="form-group">
				<?= Html::submitButton( 'LƯU SLIDER', ['class' => 'btn btn-primary', 'name' => 'slider-button'] ) ?>
			</div>	
		<?php ActiveForm::end() ?> <!-- / #new-slider-form -->
	</div> <!-- / .panel-body -->
</div> <!-- / .panel .panel-default -->