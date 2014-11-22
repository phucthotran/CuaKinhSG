<?php
use yii\helpers\Html;
use app\components\Sidebar\SidebarWidget;
?>

<div class="panel <?= $priorityMode == SidebarWidget::MODE_NORMAL ? 'panel-info' : 'panel-danger' ?>">
	<div class="panel-heading">
		<span class="glyphicon <?= $priorityMode == SidebarWidget::MODE_NORMAL ? 'glyphicon-th' : 'glyphicon-fire' ?>"></span> <?= Html::encode( $title ) ?>
	</div>
	<?= $body ?>
</div> <!-- / .panel .panel-info -->