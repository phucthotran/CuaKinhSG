<?php
	use app\models\Page;

	$this->title = $page->title . ' - Cửa kính nhôm Quốc Bảo';
	$this->params['breadcrumbs'][] = $page->title;
?>

<?= $page->content ?>