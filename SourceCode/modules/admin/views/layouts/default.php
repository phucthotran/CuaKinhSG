<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\models\Setting;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php 
$this->registerCssFile( '/web/css/admin-custom.css', ['position' => \yii\web\View::POS_BEGIN] );

$this->registerJsFile( 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', ['position' => \yii\web\View::POS_HEAD] );
$this->registerJsFile( 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', ['position' => \yii\web\View::POS_HEAD] );
	
$corporationName = strval( Setting::findOne( ['name' => 'general_corp_name'] )->value );
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<?= Html::csrfMetaTags() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>	
	<title><?= Html::encode($this->title) . ' | ' . $corporationName . ' - Control Panel' ?></title>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<?php
	    NavBar::begin( array(
	        'brandLabel' => $corporationName . ' <small>Control Panel</small>',
	        'brandUrl' => '#',
	        'options' => [
	            'class' => 'navbar-inverse',
	        ],
	    ) );
	    echo Nav::widget( array(
	        'options' => ['class' => 'navbar-nav'],
	        'items' => array(
	            array( 'label' => 'Trang Chủ', 'url' => ['/admin'] ),
	        ),
	    ) );
	    NavBar::end();	     
	?>
	
	<div id="main-wrapper">
		<div class="container">
			<div class="row">
				<?= $content ?>
			</div> <!-- / .row -->
		</div> <!-- / .container-fluid -->
	</div> <!-- / #main-wrapper -->	
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>