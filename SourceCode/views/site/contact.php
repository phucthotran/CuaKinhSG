<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Liên Hệ - Cửa kính nhôm Quốc Bảo';
$this->params['breadcrumbs'][] = 'Liên Hệ';
?>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
    <div class="alert alert-success">
        Cảm ơn quý khách đã liên hệ với chúng tôi. Chúng tôi sẽ hồi âm lại cho quý khách trong thời gian sớm nhất có thể.
    </div>    
<?php endif; ?>

<div id="contact-page" class="container">
	<div class="col-md-4 left-side">
		<h3>Cơ sở cửa nhôm kính <strong>Quốc Bảo</strong></h3>
		<p><span class="glyphicon glyphicon-home"></span> Số 7 Huỳnh Thiện Lộc, P.Hòa Thạnh, Q.Tân Phú, TP.HCM</p>
		<p><span class="glyphicon glyphicon-phone-alt"></span> 0934094456</p>	
	</div> <!-- / .col-md-4 -->
	<div class="col-md-8">
		<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= $form->field($model, 'name', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('name')],])->label(false) ?>
        <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('email')],])->label(false) ?>
        <?= $form->field($model, 'subject', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('subject')],])->label(false) ?>
        <?= $form->field($model, 'body')->textArea(['rows' => 15])->label(false) ?>
        <?= $form->field($model, 'verifyCode', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('verifyCode')],])->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-md-4">{image}</div><div class="col-md-8">{input}</div></div>',
        ])->label(false) ?>
        <div class="form-group">
            <?= Html::submitButton('GỬI', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
    	<?php ActiveForm::end(); ?> <!-- / #contact-form -->
	</div> <!-- / .col-md-8 -->
</div> <!-- #contact-page -->