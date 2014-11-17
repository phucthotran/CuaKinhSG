<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Carousel;
use app\models\Setting;
use app\models\Announcement;
use app\models\Page;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $announcement app\models\Announcement */
/* @var $page app\models\Page */

AppAsset::register($this);

$this->registerCssFile('/css/custom.css', ['position' => \yii\web\View::POS_BEGIN]);

$this->registerJsFile('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://oss.maxcdn.com/respond/1.4.2/respond.min.js', ['position' => \yii\web\View::POS_HEAD]);

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('/js/maplace-0.1.3.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('/js/functions.js', ['position' => \yii\web\View::POS_END]);
?>

<?php
$announcements = Announcement::find()->where(['publish' => '1'])->orderBy('modeId DESC')->all();

if ( Setting::findOne(['name' => 'widget_enable']) != null ) {
	$widgetEnable = Setting::findOne(['name' => 'widget_enable'])->value;
}

if ( $widgetEnable ) {
	
	if ( Setting::findOne(['name' => 'widget_1_title']) != null ) {
		$widget1Title = Setting::findOne(['name' => 'widget_1_title'])->value;
	}
	
	if ( Setting::findOne(['name' => 'widget_1_text']) != null ) {
		$widget1Text = Setting::findOne(['name' => 'widget_1_text'])->value;
	}
	
	if ( Setting::findOne(['name' => 'widget_2_title']) != null ) {
		$widget2Title = Setting::findOne(['name' => 'widget_2_title'])->value;
	}
	
	if ( Setting::findOne(['name' => 'widget_2_text']) != null ) {
		$widget2Text = Setting::findOne(['name' => 'widget_2_text'])->value;
	}
}

if ( Setting::findOne(['name' => 'navbar_items']) != null ) {
	$pagesId = explode( ';', strval( Setting::findOne(['name' => 'navbar_items'])->value ) );
	
	$navbarItems = array();
	$idx = 1;
	
	$navbarItems[0] = array('label' => 'Trang Chủ', 'url' => '/web');
	
	foreach ( $pagesId as $pageId ) {
		$page = Page::findOne(['id' => $pageId, 'publish' => '1']);
		
		if ( $page != null ) {
			$navbarItems[$idx] = array('label' => $page->title, 'url' => '/web/site/page/' . $page->url);
		}
		
		$idx++;
	}
}

if ( Setting::findOne(['name' => 'general_breadcrumb_enable']) != null ) {
	$breadcrumbEnable = Setting::findOne(['name' => 'general_breadcrumb_enable'])->value;
}

if( Setting::findOne(['name' => 'general_web_name']) != null )
	$websiteName = strval( Setting::findOne(['name' => 'general_web_name'])->value );

if( Setting::findOne(['name' => 'general_web_title']) != null )
	$websiteTitle = strval( Setting::findOne(['name' => 'general_web_title'])->value );

if( Setting::findOne(['name' => 'general_corp_name']) != null )
	$corporationName = strval( Setting::findOne(['name' => 'general_corp_name'])->value );

if( Setting::findOne(['name' => 'general_corp_address']) != null )
	$mapAddress = strval( Setting::findOne(['name' => 'general_corp_address'])->value );

if( Setting::findOne(['name' => 'map_lat']) != null )
	$mapLat = strval( Setting::findOne(['name' => 'map_lat'])->value );

if( Setting::findOne(['name' => 'map_long']) != null )
	$mapLong = strval( Setting::findOne(['name' => 'map_long'])->value );
?>

<?php 
$css = <<<EOT
	#web-carousel {
		max-height: 400px !important;
		overflow: hidden !important;
	 }
	
	#web-carousel .carousel-indicators li {
		background-color: #edecec !important;
		border-color: #bababa !important;
	}
	
	#web-carousel .carousel-indicators li.active {
		background-color: #ccc !important;
	}
	
	#web-carousel .carousel-indicators li:hover {
		background-color: #fff !important;
	}
	
	#web-carousel .carousel-inner .carousel-caption {
		color: #666 !important;
		text-transform: uppercase !important;
		font-size: 1.1em !important;
		text-shadow: none !important;	
	}
EOT;

$maplaceScript = <<<EOT
	new Maplace({
			locations: [{ lat: {lat}, lon: {long}, zoom: 16 }],
			controls_on_map: false,
			show_infowindow: false,
			map_options: {
				scrollwheel: false
			}
	}).Load();
EOT;

$maplaceScript = str_replace('{lat}', $mapLat, $maplaceScript);
$maplaceScript = str_replace('{long}', $mapLong, $maplaceScript);

if (Yii::$app->controller->action->id == 'index')
	$this->registerCss($css, ['position' => \yii\web\View::POS_HEAD]);

$this->registerJs($maplaceScript, \yii\web\View::POS_READY, 'maplace');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="description" content="Cơ sở cửa kính nhôm Quốc Bảo, cửa kính nhôm cao cấp">
	<meta name="keywords" content="QUốc Bảo, Cửa kính nhôm, Quoc Bao, Cua kinh nhom">
	<meta name="author" content="ThoTran Coder">
	<?= Html::csrfMetaTags() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>	
    <title><?= Html::encode($this->title) . ' - ' . Html::encode($websiteTitle) ?></title>
	
	<?php $this->head() ?>	
</head>

<body>
	<?php $this->beginBody() ?>
	<div class="top-button" title="Cuộn lên đầu trang"></div>

	<?php
	    NavBar::begin([
	        'brandLabel' => $corporationName,
	        'brandUrl' => Yii::$app->homeUrl,
	        'options' => [
	            'class' => 'navbar-default',
	        ],
	    ]);
	    echo Nav::widget([
	        'options' => ['class' => 'navbar-nav'],
	        'items' => $navbarItems,
	    ]);
	    NavBar::end();
	?>
	
	<?php if (Yii::$app->controller->action->id == 'index'): ?>
	
	<div style="padding: 0; margin-top: -20px;" class="container-fluid">
		<div id="web-carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#web-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#web-carousel" data-slide-to="1"></li>
				<li data-target="#web-carousel" data-slide-to="2"></li>
			</ol> <!-- / .carousel-indicators -->

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
				  <img src="/data/s1.jpg" alt="...">
				  <div class="carousel-caption">					
				  </div>
				</div>
				<div class="item">
				  <img src="/data/s2.jpg" alt="...">
				  <div class="carousel-caption">					
				  </div>
				</div>
				<div class="item">
				  <img src="/data/s3.jpg" alt="...">
				  <div class="carousel-caption">					
				  </div>
				</div>
			</div> <!-- / .carousel-inner -->

			<!-- Controls -->
			<a class="left carousel-control" href="#web-carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#web-carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div> <!-- / .carousel slide -->
	</div> <!-- / .container-fluid -->
	
	<?php endif; ?>	
	
	<div id="main-wrapper" class="container">
		
		<?php if ( $breadcrumbEnable ): ?>
		<div class="row">
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
		</div>
		<?php endif; ?>
		
		<?php foreach ( $announcements as $announcement ): ?>
			<?php if ( $announcement->modeId == 0 ): ?>
				<div class="row">
					<div class="alert alert-info normal-announcement" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>						
						<p><strong><?= $announcement->title ?></strong>: <?= $announcement->content ?></p>
					</div>
				</div>
			<?php elseif ( $announcement->modeId == 1 ): ?>
				<div class="row">
					<div class="alert alert-danger important-announcement" role="alert">						
						<p><strong><?= $announcement->title ?></strong>: <?= $announcement->content ?></p>
					</div>
				</div>
			<?php endif; ?>		
		<?php endforeach; ?>
		
		<div id="main-content" class="row">
			<?= $content ?>	
		</div> <!-- / #main-content .row -->
		
	</div> <!-- / .container #main-wrapper -->
	
	<div class="container-fluid">				
		<div class="row corp-map">
			<p class="corp-map-title"><?= $mapAddress ?></p>
			<div id="gmap" class="corp-map-inner"></div>
		</div> <!-- / .row .corp-map -->
	</div> <!-- / .container-fluid -->
	
	<div id="footer">
		<?php if ( $widgetEnable ): ?>
		<div class="container-fluid">
			<div class="footer-header container">				
				<div class="row">					
					<div class="col-md-6">
						<h3 class="col-title"><?= $widget1Title ?></h3>
						<p class="col-summary">						
						</p>
						<div class="col-content">
							<?= $widget1Text ?>
						</div>
					</div> <!-- / .col-md-6 -->
					
					<div class="col-md-6">
						<h3 class="col-title"><?= $widget2Title ?></h3>
						<p class="col-summary">						
						</p>
						<div class="col-content">
							<?= $widget2Text ?>
						</div>
					</div> <!-- / .col-md-6 -->
				</div> <!-- / .row -->				
			</div> <!-- / .footer-header .container -->
		</div> <!-- / .container-fluid -->
		<?php endif; ?>
		<div class="footer-text">
			<div class="container">
				<p>&copy; <?= date('Y') ?> Bản quyền thuộc về <strong><?= $websiteName ?></strong>.</p>
				<p>Xây dựng bởi <a href="https://www.facebook.com/thotran.developer" title="Ghé thăm Facebook của tôi" target="_blank">ThoTran Coder</a></p>
			</div>
		</div> <!-- / .footer-text -->
	</div> <!-- / #footer .container-fluid -->	
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>