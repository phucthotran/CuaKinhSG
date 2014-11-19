<?php

$url = Yii::$app->urlManager->createUrl('admin/sidebar');

$priorityToggleScript = <<<EOT
	$('.sidebar-priority').on('click', function(){
		var current = $(this);
		var sidebarId = current.attr('sidebar-id');
		
		$.post('{$url}/priority/' + sidebarId, function (result){
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
	$('.sidebar-publish').on('click', function(){
		var current = $(this);
		var sidebarId = current.attr('sidebar-id');
		
		$.post('{$url}/publish/' + sidebarId, function (result){
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
	$('.sidebar-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa Sidebar này'))
			return;
		
		var current = $(this);
		var sidebarId = current.attr('sidebar-id');
		
		$.post('{$url}/remove/' + sidebarId, function(result){
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
/* @var $sidebar app\models\Sidebar */

$this->title = 'Quản Lý Sidebar';
$this->registerJs( $priorityToggleScript, \yii\web\View::POS_READY );
$this->registerJs( $publishToggleScript, \yii\web\View::POS_READY );
$this->registerJs( $deleteToggleScript, \yii\web\View::POS_READY );
?>
<div>
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM SIDEBAR</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>Mức Độ</th>
					<th>Vị Trí Ưu Tiên</th>
					<th>Công Khai</th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nth = 1;
				foreach( $sidebars as $sidebar ):
				?>
				<tr>
					<td><?= $nth ?></td>
					<td><?= $sidebar->title ?>
					
					<?php if ( $sidebar->priorityMode == 0 ): ?>
						<td><a class="glyphicon glyphicon-bookmark sidebar-priority" title="Bình Thường" sidebar-id="<?= $sidebar->id ?>" href="#"></a></td>
					<?php elseif ( $sidebar->priorityMode == 1 ): ?>
						<td><a class="glyphicon glyphicon-fire sidebar-priority" title="Quan Trọng" sidebar-id="<?= $sidebar->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<td><?= $sidebar->position ?></td>
					
					<?php if ( $sidebar->publish > 0 ): ?>
						<td><a class="glyphicon glyphicon-ok sidebar-publish" sidebar-id="<?= $sidebar->id ?>" href="#"></a></td>
					<?php else: ?>
						<td><a class="glyphicon glyphicon-remove sidebar-publish" sidebar-id="<?= $sidebar->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= $url ?>/edit/<?= $sidebar->id ?>"></a></td>
					<td><a class="glyphicon glyphicon-trash sidebar-del" sidebar-id="<?= $sidebar->id ?>" title="Xóa" href="#"></a></td>
				</tr>
				<?php 
					$nth ++;
				endforeach;
				?>
			</tbody>
		</table>
	</div> <!-- / .row -->
</div>