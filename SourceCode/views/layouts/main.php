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
    <title><?= Html::encode($this->title) ?></title>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/custom.css" rel="stylesheet" type="text/css">	
</head>

<body>
	<div class="top-button" title="Cuộn lên đầu trang"></div>

	<?php
	    NavBar::begin([
	        'brandLabel' => 'QUỐC BẢO',
	        'brandUrl' => Yii::$app->homeUrl,
	        'options' => [
	            'class' => 'navbar-default',
	        ],
	    ]);
	    echo Nav::widget([
	        'options' => ['class' => 'navbar-nav'],
	        'items' => [
	            ['label' => 'Trang Chủ', 'url' => ['/site/index']],
	            ['label' => 'Giới Thiệu', 'url' => ['/site/about']],
	            ['label' => 'Bảng Báo Giá', 'url' => ['/site/products']],
	        	['label' => 'Liên Hệ', 'url' => ['/site/contact']],	            
	        ],
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
				  <img src="data/s1.jpg" alt="...">
				  <div class="carousel-caption">					
				  </div>
				</div>
				<div class="item">
				  <img src="data/s2.jpg" alt="...">
				  <div class="carousel-caption">					
				  </div>
				</div>
				<div class="item">
				  <img src="data/s3.jpg" alt="...">
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
		
		<div class="row">
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
		</div>
		
		<div class="row">
			<div class="alert alert-info normal-announcement" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<p>Liên hệ <span><span class="glyphicon glyphicon-phone-alt"></span> 0934094456</span> để được tư vấn và đặt hàng ngay hôm nay</p>
			</div>
		</div>
		
		<div id="main-content" class="row">
			<?= $content ?>	
		</div> <!-- / #main-content .row -->
		
	</div> <!-- / .container #main-wrapper -->
	
	<div class="container-fluid">				
		<div class="row corp-map">
			<p class="corp-map-title">Số 7 Huỳnh Thiện Lộc, P.Hòa Thạnh, Q.Tân Phú, TP.HCM</p>
			<div id="gmap" class="corp-map-inner"></div>			
		</div> <!-- / .row .corp-map -->
	</div> <!-- / .container-fluid -->
	
	<div id="footer">
		<div class="container-fluid">
			<div class="footer-header container">
				<div class="row">
					<div class="col-md-6 col-intro">
						<h3 class="col-title">Cơ sở cửa kính nhôm <strong>Quốc Bảo</strong></h3>
						<p class="col-summary">						
						</p>
						<div class="col-content">
							<p>Cung cấp tất cả các loại dịch vụ ngành kính xây dựng như</p>
							<ul>
								<li>Sửa cửa kính, cửa kiếng</li>
								<li>Lắp đặt, thi công các công trình cửa kính</li>
								<li>Thiết kế các mẫu cửa kính theo ý tưởng của khách hàng</li>
							</ul>
						</div>
					</div> <!-- / .col-md-6 .col-intro -->
					
					<div class="col-md-6 col-sub hidden-sm hidden-xs">
						<h3 class="col-title">Đăng ký nhận tin</h3>
						<p class="col-summary">Nhận tin mới nhất về những sản phẩm của chúng tôi</p>
						<div class="col-content input-group">
							<span class="input-group-addon">@</span>
							<input class="form-control" type="email" placeholder="Email" name="sub_email"/>
							<span class="input-group-btn">							
								<button class="btn btn-primary" type="button" name="sub_done">ĐĂNG KÝ</button>
							</span>						
						</div>
					</div> <!-- / .col-md-6 .col-sub .hidden-sm .hidden-xs -->
					
					<div class="col-md-6 col-sub-xs visible-sm-block visible-xs-block">
						<h3 class="col-title">Đăng ký nhận tin</h3>
						<p class="col-summary">Nhận tin mới nhất về những sản phẩm của chúng tôi</p>
						<div class="col-content input-group">
							<span class="input-group-addon">@</span>
							<input class="form-control" type="email" placeholder="Email" name="sub_email"/>
							<span class="input-group-btn">							
								<button class="btn btn-primary" type="button" name="sub_done">ĐĂNG KÝ</button>
							</span>						
						</div>
					</div> <!-- / .col-sub-xs .visible-sm-block .visible-xs-block -->
				</div> <!-- / .row -->
			</div> <!-- / .footer-header .container -->
		</div> <!-- / .container-fluid -->		
		<div class="footer-text">
			<div class="container">
				<p>&copy; <?= date('Y') ?> Bản quyền thuộc về <strong>CuaKinhSG</strong>.</p>
				<p>Xây dựng bởi <a href="https://www.facebook.com/thotran.developer" title="Ghé thăm Facebook của tôi" target="_blank">ThoTran Coder</a></p>
			</div>
		</div> <!-- / .footer-text -->
	</div> <!-- / #footer .container-fluid -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js" type="text/javascript"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7" type="text/javascript"></script>
	<script src="js/maplace-0.1.3.min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
	
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>