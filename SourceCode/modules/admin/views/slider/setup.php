<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\SliderSetupForm */

$this->title = 'Cài Đặt Slider';

?>

<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin( ['id' => 'slider-setup-form'] ) ?>
		<?= $form->field( $model, 'enable' )->checkbox() ?>
		<div class="form-group">
			<?= Html::submitButton( 'LƯU CÀI ĐẶT', ['class' => 'btn btn-primary', 'name' => 'slider-button'] ) ?>
		</div>
		<?php ActiveForm::end(); ?> <!-- #slider-setup-form -->		
	</div>
</div>