<?php
	use app\models\Page;

	$this->title = $page->title;
	$this->params['breadcrumbs'][] = $page->title;
?>

<?= $page->content ?>