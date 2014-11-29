<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Liên Hệ';
$this->params['breadcrumbs'][] = 'Liên Hệ';
?>

<?php 
$style = <<<EOT
	#contact-page {
		min-height: 500px;
	}
	
	#contact-page .left-side {
		font-size: 1.1em;
	}
	
	#contact-page .left-side h3 {
		text-transform: uppercase;
	}
EOT;

$this->registerCss( $style, ['position' => \yii\web\View::POS_HEAD] );
$this->registerMetaTag( ['property' => 'og:url', 'content' => Yii::$app->urlManager->createAbsoluteUrl('site/contact')], 'url_og' );
?>

<?php if (Yii::$app->session->hasFlash( 'Done' )): ?>
    <div class="alert alert-success">
        Cảm ơn quý khách đã liên hệ với chúng tôi. Chúng tôi sẽ hồi âm lại cho quý khách trong thời gian sớm nhất có thể.
    </div>    
<?php endif; ?>

<div id="contact-page" class="container">
	<div class="col-md-4 left-side">
		<h3><?= $websiteTitle ?></h3>
		<p><span class="glyphicon glyphicon-home"></span> <?= $corporationAddress ?></p>
		<p><span class="glyphicon glyphicon-phone-alt"></span> <?= $corporationPhone ?></p>	
	</div> <!-- / .col-md-4 -->
	<div class="col-md-8">
		<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= $form->field($model, 'name', array( 'inputOptions' => ['placeholder' => $model->getAttributeLabel('name')], ) )->label(false) ?>
        <?= $form->field($model, 'email', array( 
        	'inputOptions' => ['placeholder' => $model->getAttributeLabel('email')], 
			'inputTemplate' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-inbox"></span>{input}</div>',        		
        ) )->label(false) ?>
        <?= $form->field($model, 'subject', array( 'inputOptions' => ['placeholder' => $model->getAttributeLabel('subject')], ))->label(false) ?>        
        <?= $form->field($model, 'body')->textArea(['rows' => 15])->label(false) ?>
        <?= $form->field($model, 'verifyCode', array( 'inputOptions' => ['placeholder' => $model->getAttributeLabel('verifyCode')], ) )
        										->widget(Captcha::className(), 
        										['template' => '<div class="row"><div class="col-md-4">{image}</div><div class="col-md-8">{input}</div></div>', ] )
        										->label(false) ?>
        <div class="form-group">
            <?= Html::submitButton( 'GỬI', ['class' => 'btn btn-primary', 'name' => 'contact-button'] ) ?>
        </div>
    	<?php ActiveForm::end(); ?> <!-- / #contact-form -->
	</div> <!-- / .col-md-8 -->
</div> <!-- #contact-page -->