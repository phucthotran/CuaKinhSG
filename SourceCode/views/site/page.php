<?php
	use app\models\Setting;
	use app\models\Sidebar;
	
	/* @var $sidebar app\models\Sidebar */
	/* @var $this yii\web\View */

	$this->title = $page->title;
	
	$homepageId = intval( Setting::findOne(['name' => 'homepage_id'])->value );
	//Not show Breadcrumb if current page is 'home page'	
	if ( $homepageId != 0 && $homepageId != $page->id ) {
		$this->params['breadcrumbs'][] = $page->title;
	}
	
	$sidebars = array();
	
	if ( $sidebarSupport ) {
		$sidebars = Sidebar::find()->where( ['publish' => '1'] )->orderBy( 'position ASC, priorityMode DESC' )->all();
	}
?>

<?php if ( $sidebarSupport && count($sidebars) > 0 ): ?>
	<div class="col-md-9">			
		<?= $page->content ?>
	</div>
	
	<div class="col-md-3 web-sidebar">	
		<?php foreach( $sidebars as $sidebar ): ?>
				<?php if ( $sidebar->templateMode == 0 ): ?>
					<div class="row">
						<div class="panel <?= $sidebar->priorityMode == 0 ? 'panel-info' : 'panel-danger' ?>">
							<div class="panel-heading">
								<span class="glyphicon <?= $sidebar->priorityMode == 0 ? 'glyphicon-th' : 'glyphicon-fire' ?>"></span> <?= $sidebar->title ?>
							</div>
							<?= $sidebar->body ?>
						</div> <!-- / .panel .panel-info -->
					</div> <!-- / .row -->
				<?php else: ?>
					<?= $sidebar->body ?>
				<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<?= $page->content ?>
<?php endif; ?>