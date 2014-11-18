<?php
use app\models\Setting;

/* @var $this yii\web\View */
/* @var $page app\models\Page */

$this->title = 'Quản Lý Trang';

$homepageId = intval( Setting::findOne( ['name' => 'homepage_id'] )->value );
$url = Yii::$app->urlManager->createUrl('admin/page');
?>

<?php 
$publishToggleScript = <<<EOT
	$('.page-publish').on('click', function(){
		var current = $(this);
		var pageId = current.attr('page-id');

		$.post('{$url}/publish/' + pageId, function (result){
			if(parseInt(result) > 0) { //Boolean
				current.removeClass('glyphicon-remove');
				current.addClass('glyphicon-ok');
			} else {
				current.removeClass('glyphicon-ok');
				current.addClass('glyphicon-remove');
			}
		});
	});
EOT;

$deleteToggleScript = <<<EOT
	$('.page-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa trang này'))
			return;

		var current = $(this);
		var pageId = current.attr('page-id');

		$.post('{$url}/remove/' + pageId, function(result){
			if(parseInt(result) == 'NaN' || parseInt(result) <= 0){
				alert('Không thể thực hiện thao tác lúc này');
				return;
			}
		
			current.parents('tr').remove();
		});
	});
EOT;

$homepageToggleScript = <<<EOT
	$('.page-home').on('click', function(){
		var current = $(this);
		var pageId = current.attr('page-id');

		$.post('{$url}/homepage/' + pageId, function(result){
			if (parseInt(result) > 0) {
				$('.page-home').removeClass('glyphicon-home');
				$('.page-home').addClass('glyphicon-file');
				current.removeClass('glyphicon-file');
				current.addClass('glyphicon-home');
			}
		});
	});
EOT;
?>

<?php 
$this->registerJs( $publishToggleScript, \yii\web\View::POS_READY );
$this->registerJs( $deleteToggleScript, \yii\web\View::POS_READY );
$this->registerJs( $homepageToggleScript, \yii\web\View::POS_READY );
?>

<div id="page-manager-page">
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM TRANG</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>URL</th>
					<th>Từ Khóa</th>
					<th>Công Khai</th>
					<th>Trang Chủ</th>
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
						<td style="text-align: center;"><a class="glyphicon glyphicon-ok page-publish" page-id="<?= $page->id ?>" href="#"></a></td>
					<?php else: ?>
						<td style="text-align: center;"><a class="glyphicon glyphicon-remove page-publish" page-id="<?= $page->id ?>" href="#"></a></td>
					<?php endif; ?>
					<?php if ( $page->id == $homepageId ): ?>
						<td><a class="glyphicon glyphicon-home page-home" page-id="<?= $page->id ?>" title="Đặt làm Trang Chủ" href="#"></a></td>
					<?php else: ?>
						<td><a class="glyphicon glyphicon-file page-home" page-id="<?= $page->id ?>" title="Đặt làm Trang Chủ" href="#"></a></td>
					<?php endif; ?>
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= $url ?>/edit/<?= $page->id ?>"></a></td>
					<td><a class="glyphicon glyphicon-trash page-del" page-id="<?= $page->id ?>" title="Xóa" href="#"></a></td>
				</tr>
				<?php
					$nth++;
				endforeach; 
				?>
			</tbody>
		</table>
	</div> <!-- / .row -->
</div> <!-- / #page-manager-page -->