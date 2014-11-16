<?php 

$priorityToggleScript = <<<EOT
	$('.announcement-priority').on('click', function(){
		var current = $(this);
		var announcementId = current.attr('announcement-id');
		
		$.post('/web/admin/announcement/priority/' + announcementId, function (result){
			if(parseInt(result) > 0) { //Boolean
				current.removeClass('glyphicon-bookmark');
				current.addClass('glyphicon-fire');
			} else {
				current.removeClass('glyphicon-fire');
				current.addClass('glyphicon-bookmark');
			}
		});		
	});	
EOT;

$publishToggleScript = <<<EOT
	$('.announcement-publish').on('click', function(){
		var current = $(this);
		var announcementId = current.attr('announcement-id');
		
		$.post('/web/admin/announcement/publish/' + announcementId, function (result){
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
	$('.announcement-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa thông báo này'))
			return;
		
		var current = $(this);
		var announcementId = current.attr('announcement-id');
		
		$.post('/web/admin/announcement/remove/' + announcementId, function(result){
			if(parseInt(result) == 'NaN' || parseInt(result) <= 0){
				alert('Không thể thực hiện thao tác lúc này');
				return;
			}
			
			current.parents('tr').remove();
		});
	});
EOT;

?>

<?php

/* @var $this yii\web\View */
/* @var $announcement app\models\Announcement */

$this->title = 'Quản Lý Thông Báo';
$this->registerJs($priorityToggleScript, \yii\web\View::POS_READY);
$this->registerJs($publishToggleScript, \yii\web\View::POS_READY);
$this->registerJs($deleteToggleScript, \yii\web\View::POS_READY);
?>
<div id="announcement-manager-page">
	<div class="row">
		<a class="btn btn-primary" href="/web/admin/announcement/new">THÊM THÔNG BÁO</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>Mức Độ</th>
					<th>Công Khai</th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nth = 1;
				foreach ( $announcements as $announcement ):
				?>
				<tr>
					<td><?= $nth ?></td>
					<td><?= $announcement->title ?>
					
					<?php if ( $announcement->modeId == 0 ): ?>
						<td><a class="glyphicon glyphicon-bookmark announcement-priority" title="Bình Thường" announcement-id="<?= $announcement->id ?>" href="#"></a></td>
					<?php elseif ( $announcement->modeId == 1 ): ?>
						<td><a class="glyphicon glyphicon-fire announcement-priority" title="Quan Trọng" announcement-id="<?= $announcement->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<?php if ( $announcement->publish > 0 ): ?>
						<td><a class="glyphicon glyphicon-ok announcement-publish" announcement-id="<?= $announcement->id ?>" href="#"></a></td>
					<?php else: ?>
						<td><a class="glyphicon glyphicon-remove announcement-publish" announcement-id="<?= $announcement->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="/web/admin/announcement/edit/<?= $announcement->id ?>"></a></td>
					<td><a class="glyphicon glyphicon-trash announcement-del" announcement-id="<?= $announcement->id ?>" title="Xóa" href="#"></a></td>
				</tr>
				<?php 
					$nth ++;
				endforeach;
				?>
			</tbody>
		</table>
	</div> <!-- / .row -->
</div> <!-- / #announcement-manager-page -->