<?php

$pagePublishScript = <<<EOT
	$('.page-publish').on('click', function(){
		var current = $(this);
		var pageId = current.attr('page-id');
		
		$.post('/web/admin/page/publish/' + pageId, function (result){
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

$pageDelScript = <<<EOT
	$('.page-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa trang này'))
			return;
		
		var current = $(this);
		var pageId = current.attr('page-id');
		
		$.post('/web/admin/page/remove/' + pageId, function(result){
			if(parseInt(result) == 'NaN' || parseInt(result) <= 0){
				alert('Không thể thực hiện thao tác lúc này');
				return;
			}
			
			current.parents('tr').remove();
		});
	});
EOT;

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Quản Lý Trang | Quốc Bảo - Control Panel';
$this->registerJs($pagePublishScript, \yii\web\View::POS_READY);
$this->registerJs($pageDelScript, \yii\web\View::POS_READY);
?>

<div id="page-manager-page">
	<div class="row">
		<a class="btn btn-primary" href="/web/admin/page/new">THÊM TRANG</a>
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
					<?php if($page->publish > 0): ?>
						<td style="text-align: center;"><a class="glyphicon glyphicon-ok page-publish" page-id="<?= $page->id ?>" href="#"></a></td>
					<?php else: ?>
						<td style="text-align: center;"><a class="glyphicon glyphicon-remove page-publish" page-id="<?= $page->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="/web/admin/page/edit/<?= $page->id ?>"></a></td>
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