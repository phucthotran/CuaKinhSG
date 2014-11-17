<?php
	use app\models\Page;
	use app\models\Setting;
	
	if ( Setting::findOne(['name' => 'homepage_id']) ) {
		$homepageId = intval( Setting::findOne(['name' => 'homepage_id'])->value );
	}

	$this->title = $page->title;
	
	if ( $homepageId != 0 && $homepageId != $page->id ) {
		$this->params['breadcrumbs'][] = $page->title;
	}
?>

<?= $page->content ?>