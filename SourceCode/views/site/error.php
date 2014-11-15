<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<?php 
$css = <<<EOT
	#error-page {
		text-align: center;
	}
	
	#error-page h1 {
		font-size: 12em;
	}
	
	#error-page h2 {
		font-size: 4em;
	}
EOT;

$this->registerCss($css, \yii\web\View::POS_HEAD);
?>

<div id="error-page">				
		<h1><?= Html::encode($this->title) ?></h1>
		<h2><?= nl2br(Html::encode($message)) ?></h2>
		<a class="btn btn-primary" href="/" title="Trang Chủ">TRỞ VỀ TRANG CHỦ</a>							
</div> <!-- / #error-page -->