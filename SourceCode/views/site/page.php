<?php
use Yii;
use app\models\Setting;
use app\models\Sidebar;
use app\components\Sidebar\SidebarWidget;

/* @var $sidebar app\models\Sidebar */
/* @var $page app\models\Page */
/* @var $this yii\web\View */

$this->title = $page->title;

$this->registerMetaTag( ['name' => 'description', 'content' => $descriptionMeta], 'description' );
$this->registerMetaTag( ['name' => 'keywords', 'content' => $page->keywords], 'keywords' );
$this->registerMetaTag( ['property' => 'og:description', 'content' => $descriptionMeta], 'description_og' );
$this->registerMetaTag( ['property' => 'og:keywords', 'content' => $page->keywords], 'keywords_og' );
$this->registerMetaTag( ['property' => 'og:title', 'content' => $this->title], 'title_og' );
$this->registerMetaTag( ['property' => 'og:url', 'content' => Yii::$app->urlManager->createAbsoluteUrl("site/page/{$page->url}")], 'url_og' );

//Not show Breadcrumb if current page is 'home page'	
if ( !$isHomepage ) {
	$this->params['breadcrumbs'][] = $page->title;
}

if ( $isHomepage ) {
	$this->registerLinkTag( ['rel' => 'canonical', 'href' => Yii::$app->urlManager->createAbsoluteUrl('/')], 'duplicate_home' );
}

$sidebars = array();

if ( $page->sidebarSupport ) {
	$sidebars = Sidebar::find()->where( ['publish' => '1'] )->orderBy( 'position ASC, priorityMode DESC' )->all();
}
?>

<?php if ( $page->sidebarSupport && count($sidebars) > 0 ): ?>
	<div class="col-md-9">			
		<?= $page->content ?>
	</div>
	
	<div class="col-md-3 web-sidebar">	
		<?php foreach( $sidebars as $sidebar ): ?>
				<?php if ( $sidebar->templateMode == 0 ): ?>
					<div class="row">												
						<?php SidebarWidget::begin( ['title' => $sidebar->title, 'priorityMode' => $sidebar->priorityMode] ) ?>
							<?= $sidebar->body ?>						
						<?php SidebarWidget::end() ?>
					</div> <!-- / .row -->
				<?php else: ?>
					<?= $sidebar->body ?>
				<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<?= $page->content ?>
<?php endif; ?>