<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Carousel;
use app\models\Setting;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php 
$this->registerCssFile( '/web/css/admin-custom.css', ['position' => \yii\web\View::POS_BEGIN] );

$this->registerJsFile( 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', ['position' => \yii\web\View::POS_HEAD] );
$this->registerJsFile( 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', ['position' => \yii\web\View::POS_HEAD] );

$this->registerJsFile( 'https://cdn.rawgit.com/jprichardson/string.js/master/lib/string.min.js', ['position' => \yii\web\View::POS_END] );
?>

<?php 
	$controller = Yii::$app->controller->id;
	$action = Yii::$app->controller->action->id;
	
	$url = "$controller/$action";	
	
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
	            array( 'label' => 'Trang Chủ', 'url' => ['/admin/default/index'] ),	        	
	        	Yii::$app->user->isGuest ? 
	        		array( 'label' => '', 'url' => ['#'] ) : 
	        		array( 'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
	        				'url' => ['/admin/user/logout'],
	        				'linkOptions' => ['data-method' => 'post']),
	        ),
	    ) );
	    NavBar::end();	     
	?>
	
	<div id="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-danger">
						<div class="panel-heading">Cài Đặt Chung</div>
						<ul class="list-group">						
							<li class="list-group-item <?= $url == 'general/index' ? 'active' : '' ?>"><a href="/web/admin/general"><span class="glyphicon glyphicon-cog"></span> Cài Đặt Cơ Bản</a></li>														
							<li class="list-group-item <?= $url == 'map/index' ? 'active' : '' ?>"><a href="/web/admin/map"><span class="glyphicon glyphicon-globe"></span> Bản Đồ</a></li>
							<li class="list-group-item <?= $url == 'footer-widget/index' ? 'active' : '' ?>"><a href="/web/admin/footer-widget"><span class="glyphicon glyphicon-th-large"></span> Footer Widget</a></li>
						</ul>
					</div> <!-- / .panel .panel-danger -->

					<div class="panel panel-danger">
						<div class="panel-heading">Trang</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'page/index' || $url == 'page/new' || $url == 'page/edit' ? 'active' : '' ?>"><a href="/web/admin/page"><span class="glyphicon glyphicon-file"></span> Quản Lý Trang</a></li>
						</ul>
					</div> <!-- / .panel .panel-danger -->

					<div class="panel panel-info">
						<div class="panel-heading">Thanh Điều Hướng</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'navbar/index' ? 'active' : '' ?>"><a href="/web/admin/navbar"><span class="glyphicon glyphicon-list"></span> Cài Đặt</a></li>
						</ul>
					</div> <!-- / .panel .panel-info -->

					<div class="panel panel-info">
						<div class="panel-heading">Thông Báo</div>
						<ul class="list-group">
							<li class="list-group-item <?= $url == 'announcement/setup' ? 'active' : '' ?>"><a href="/web/admin/announcement/setup"><span class="glyphicon glyphicon-wrench"></span> Cài Đặt</a></li>
							<li class="list-group-item <?= $url == 'announcement/index' || $url == 'announcement/new' || $url == 'announcement/edit' ? 'active' : '' ?>"><a href="/web/admin/announcement"><span class="glyphicon glyphicon-bullhorn"></span> Quản Lý</a></li>
						</ul>
					</div> <!-- / .panel .panel-info -->

				</div> <!-- / .col-md-3 -->
				<div class="col-md-9">
					<?php if ( Yii::$app->session->hasFlash( 'Done' ) ): ?>
						<div class="alert alert-success">Thông tin đã được lưu lại!</div>
					<?php elseif ( Yii::$app->session->hasFlash( 'Fail' ) ): ?>
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<p>Không thể thực hiện thao tác lúc này!</p>
						</div>
					<?php endif; ?>
					<?= $content ?>
				</div> <!-- / .col-md-9 -->
			</div> <!-- / .row -->
		</div> <!-- / .container-fluid -->
	</div> <!-- / #main-wrapper -->	
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>