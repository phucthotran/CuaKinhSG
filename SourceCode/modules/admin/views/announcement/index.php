<?php
use yii\helpers\Html;

$url = Yii::$app->urlManager->createUrl('admin/announcement');

$pageUpdateScript = <<<EOT
	$('.table-update').on('click', function(e) {
		e.preventDefault();		
		$.pjax.reload({container: '#data-table'});
	});
EOT;
?>

<?php

/* @var $this yii\web\View */
/* @var $announcement app\models\Announcement */

$this->title = 'Quản Lý Thông Báo';
$this->registerJs( $pageUpdateScript, \yii\web\View::POS_READY );
?>
<div>
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM THÔNG BÁO</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<?php \yii\widgets\Pjax::begin( ['id' => 'data-table'] ) ?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>Mức Độ</th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nth = 1;
				foreach( $announcements as $announcement ):
				?>
				<tr>
					<td><?= $nth ?></td>
					<td><?= $announcement->title ?>
					
					<?php if ( $announcement->modeId == 0 ): ?>
						<td><?= Html::a( "", "{$url}/priority/{$announcement->id}", ['class' => 'glyphicon glyphicon-bookmark table-update', 'data-method' => 'post', 'title' => 'Bình Thường'] ) ?></td>						
					<?php elseif ( $announcement->modeId == 1 ): ?>
						<td><?= Html::a( "", "{$url}/priority/{$announcement->id}", ['class' => 'glyphicon glyphicon-fire table-update', 'data-method' => 'post', 'title' => 'Quan Trọng'] ) ?></td>						
					<?php endif; ?>
					
					<?php if ( $announcement->publish == 1 ): ?>
						<td><?= Html::a( "", "{$url}/publish/{$announcement->id}", ['class' => 'glyphicon glyphicon-ok table-update', 'data-method' => 'post', 'title' => 'Công khai'] ) ?></td>						
					<?php else: ?>
						<td><?= Html::a( "", "{$url}/publish/{$announcement->id}", ['class' => 'glyphicon glyphicon-remove table-update', 'data-method' => 'post', 'title' => 'Không công khai'] ) ?></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= "{$url}/edit/{$announcement->id}" ?>"></a></td>					
					<td><?= Html::a( "", "{$url}/remove/{$announcement->id}", ['class' => 'glyphicon glyphicon-trash table-update', 'data-method' => 'post', 'title' => 'Xóa'] ) ?></td>					
				</tr>
				<?php 
					$nth ++;
				endforeach;
				?>
			</tbody>
		</table>
		<?php \yii\widgets\Pjax::end() ?>
	</div> <!-- / .row -->
</div>