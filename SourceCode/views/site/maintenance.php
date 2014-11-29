<?php
/* @var $this yii\web\View */

$this->title = 'Bảo Trì Website';
?>

<?php
$style = <<<EOT
	#maintenance-page h1 {
		font-size: 12em;
	}

	#maintenance-page h2 {
		font-size: 4em;
	}
EOT;

$this->registerCss( $style, ['position' => \yii\web\View::POS_HEAD] );
$this->registerMetaTag( ['name' => 'robots', 'content' => 'noindex, nofollow'], 'no_robots' );
?>
<div id="maintenance-page" class="center-block text-center">
	<h1><span class="glyphicon glyphicon-time"></span><br>BẢO TRÌ WEBSITE</h1>
	<h2><?= $message ?></h2>
</div>