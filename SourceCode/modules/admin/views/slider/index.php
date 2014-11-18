<?php

$url = Yii::$app->urlManager->createUrl('admin/slider');

$publishToggleScript = <<<EOT
	$('.slider-publish').on('click', function(){
		var current = $(this);
		var sliderId = current.attr('slider-id');
		
		$.post('{$url}/publish/' + sliderId, function (result){
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
	$('.slider-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa Slider này'))
			return;
		
		var current = $(this);
		var sliderId = current.attr('slider-id');
		
		$.post('{$url}/remove/' + sliderId, function(result){
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
/* @var $slider app\models\Slider */

$this->title = 'Quản Lý Slider';
$this->registerJs( $publishToggleScript, \yii\web\View::POS_READY );
$this->registerJs( $deleteToggleScript, \yii\web\View::POS_READY );
?>
<div>
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM SLIDER</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>Link</th>
					<th>Công Khai</th>
					<th style="width: 16px;"></th>
					<th style="width: 16px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nth = 1;
				foreach( $sliders as $slider ):
				?>
				<tr>
					<td><?= $nth ?></td>
					<td><?= $slider->caption ?>
					<td><a href="<?= $slider->link ?>" title="Click"><?= $slider->link ?></a></td>
					
					<?php if ( $slider->publish > 0 ): ?>
						<td><a class="glyphicon glyphicon-ok slider-publish" slider-id="<?= $slider->id ?>" href="#"></a></td>
					<?php else: ?>
						<td><a class="glyphicon glyphicon-remove slider-publish" slider-id="<?= $slider->id ?>" href="#"></a></td>
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= $url ?>/edit/<?= $slider->id ?>"></a></td>
					<td><a class="glyphicon glyphicon-trash slider-del" slider-id="<?= $slider->id ?>" title="Xóa" href="#"></a></td>
				</tr>
				<?php 
					$nth ++;
				endforeach;
				?>
			</tbody>
		</table>
	</div> <!-- / .row -->
</div>