<?php
use app\models\Setting;
use yii\helpers\Html;

$pageUpdateScript = <<<EOT
	$('.table-update').on('click', function(e) {
		e.preventDefault();		
		$.pjax.reload({container: '#data-table'});
	});
EOT;

$homepageId = intval( Setting::findOne( ['name' => 'homepage_id'] )->value );
$url = Yii::$app->urlManager->createUrl('admin/page');
?>

<?php
/* @var $this yii\web\View */
/* @var $page app\models\Page */

$this->title = 'Quản Lý Trang';
$this->registerJs( $pageUpdateScript, \yii\web\View::POS_READY );
?>

<div>
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM TRANG</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<?php \yii\widgets\Pjax::begin( ['id' => 'data-table'] ) ?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>URL</th>
					<th>Từ Khóa</th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nth = 1;
				
				foreach($pages as $page): 
				?>
				<tr>
					<td><?= $nth ?></td>
					<td><?= $page->title ?></td>
					<td><?= $page->url ?></td>
					<td><?= $page->keywords ?></td>
					<?php if ( $page->publish == 1 ): ?>
						<td><?= Html::a( "", "{$url}/publish/{$page->id}", ['class' => 'glyphicon glyphicon-ok table-update', 'data-method' => 'post', 'title' => 'Công khai'] ) ?></td>						
					<?php else: ?>
						<td><?= Html::a( "", "{$url}/publish/{$page->id}", ['class' => 'glyphicon glyphicon-remove table-update', 'data-method' => 'post', 'title' => 'Không công khai'] ) ?></td>						
					<?php endif; ?>
					<?php if ( $page->id == $homepageId ): ?>
						<td><?= Html::a( "", "{$url}/homepage/{$page->id}", ['class' => 'glyphicon glyphicon-home table-update', 'data-method' => 'post', 'title' => 'Trang Chủ'] ) ?></td>						
					<?php else: ?>
						<td><?= Html::a( "", "{$url}/homepage/{$page->id}", ['class' => 'glyphicon glyphicon-file table-update', 'data-method' => 'post', 'title' => 'Đặt làm Trang Chủ'] ) ?></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-eye-open" title="Xem Trước" target="_blank" href="<?= Yii::$app->urlManager->createUrl('site/page') ?>/<?= $page->url ?>"></a></td>
					
					<?php if ( $page->sidebarSupport == 1 ): ?>
						<td><?= Html::a( "", "{$url}/sidebar/{$page->id}", ['class' => 'glyphicon glyphicon-tasks table-update', 'data-method' => 'post', 'title' => 'Hỗ trợ Sidebar'] ) ?></td>						
					<?php else: ?>
						<td><?= Html::a( "", "{$url}/sidebar/{$page->id}", ['class' => 'glyphicon glyphicon-align-justify table-update', 'data-method' => 'post', 'title' => 'Không hỗ trợ Sidebar'] ) ?></td>						
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= "{$url}/edit/{$page->id}" ?>"></a></td>
					<td><?= Html::a( "", "{$url}/remove/{$page->id}", ['class' => 'glyphicon glyphicon-trash table-update', 'data-method' => 'post', 'title' => 'Xóa'] ) ?></td>					
				</tr>
				<?php
					$nth++;
				endforeach; 
				?>
			</tbody>
		</table>
		<?php \yii\widgets\Pjax::end() ?>
	</div> <!-- / .row -->
</div>