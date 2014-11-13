<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Carousel;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php 
	$controller = Yii::$app->controller->id;
	$action = Yii::$app->controller->action->id;
	
	$url = "$controller/$action";
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<?= Html::csrfMetaTags() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>	
	<title><?= Html::encode($this->title) ?></title>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link href="/web/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/web/css/admin-custom.css" rel="stylesheet" type="text/css">
</head>
<body>

	<?php
	    NavBar::begin([
	        'brandLabel' => 'Quốc Bảo <small>Control Panel</small>',
	        'brandUrl' => '#',
	        'options' => [
	            'class' => 'navbar-inverse',
	        ],
	    ]);
	    echo Nav::widget([
	        'options' => ['class' => 'navbar-nav'],
	        'items' => [
	            ['label' => 'Trang Chủ', 'url' => ['/admin']],
        		Yii::$app->user->isGuest ?
        		['label' => ''] :
        		['label' => 'Thoát (' . Yii::$app->user->identity->username . ')', 
        				'url' => ['/admin/logout'],
        				'linkOptions' => ['data-method' => 'post']],
	        ],
	    ]);
	    NavBar::end();
	?>
	
	<div id="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-danger">
						<div class="panel-heading">Cài Đặt Tin Chung</div>
						<ul class="list-group">							
							<li class="list-group-item <?= $url == 'general/index' ? 'active' : '' ?>"><a href="index.php?r=admin/general"><span class="glyphicon glyphicon-cog"></span> Thông Tin Website</a></li>							
							<li class="list-group-item <?= $url == 'breadcrumb/index' ? 'active' : '' ?>"><a href="index.php?r=admin/breadcrumb"><span class="glyphicon glyphicon-forward"></span> Box Định Hướng</a></li>							
							<li class="list-group-item <?= $url == 'map/index' ? 'active' : '' ?>"><a href="index.php?r=admin/map"><span class="glyphicon glyphicon-globe"></span> Bản Đồ</a></li>
							<li class="list-group-item <?= $url == 'footerwidget/index' ? 'active' : '' ?>"><a href="index.php?r=admin/footerwidget"><span class="glyphicon glyphicon-th-large"></span> Footer Widget</a></li>
						</ul>
					</div> <!-- / .panel .panel-danger -->

					<div class="panel panel-danger">
						<div class="panel-heading">Trang</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'page/index' ? 'active' : '' ?>"><a href="index.php?r=admin/page"><span class="glyphicon glyphicon-file"></span> Quản Lý Trang</a></li>
						</ul>
					</div> <!-- / .panel .panel-danger -->

					<div class="panel panel-info">
						<div class="panel-heading">Thanh Điều Hướng</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'navbar/index' ? 'active' : '' ?>"><a href="index.php?r=admin/navbar"><span class="glyphicon glyphicon-list"></span> Cài Đặt</a></li>
						</ul>
					</div> <!-- / .panel .panel-info -->

					<div class="panel panel-info">
						<div class="panel-heading">Thông Báo</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'announcement/index' ? 'active' : '' ?>"><a href="index.php?r=admin/announcement"><span class="glyphicon glyphicon-wrench"></span> Cài Đặt</a></li>
							<li class="list-group-item <?= $url == 'announcement/management' ? 'active' : '' ?>"><a href="index.php?r=admin/announcement/management"><span class="glyphicon glyphicon-bullhorn"></span> Quản Lý</a></li>
						</ul>
					</div> <!-- / .panel .panel-info -->

				</div> <!-- / .col-md-3 -->
				<div class="col-md-9">
					<?= $content ?>
				</div> <!-- / .col-md-9 -->
			</div> <!-- / .row -->
		</div> <!-- / .container-fluid -->
	</div> <!-- / #main-wrapper -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js" type="text/javascript"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/web/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/web/js/admin-functions.js" type="text/javascript"></script>
</body>