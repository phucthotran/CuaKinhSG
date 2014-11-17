<?php
	use app\models\Setting;

	$this->title = $page->title;
	
	$homepageId = intval( Setting::findOne(['name' => 'homepage_id'])->value );
	//Not show Breadcrumb if current page is 'home page'	
	if ( $homepageId != 0 && $homepageId != $page->id ) {
		$this->params['breadcrumbs'][] = $page->title;
	}
?>

<?= $page->content ?>