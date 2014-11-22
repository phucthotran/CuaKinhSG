<?php
use yii\helpers\Html;

$url = Yii::$app->urlManager->createUrl('admin/slider');

$pageUpdateScript = <<<EOT
	$('.table-update').on('click', function(e) {
		e.preventDefault();		
		$.pjax.reload({container: '#data-table'});
	});
EOT;
?>

<?php

/* @var $this yii\web\View */
/* @var $slider app\models\Slider */

$this->title = 'Quản Lý Slider';
$this->registerJs( $pageUpdateScript, \yii\web\View::POS_READY );
?>
<div>
	<div class="row">
		<a class="btn btn-primary" href="<?= $url ?>/new">THÊM SLIDER</a>
	</div> <!-- / .row -->
	<div style="margin: 20px 0;"></div>
	<div class="row">
		<?php \yii\widgets\Pjax::begin( ['id' => 'data-table'] ) ?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiêu Đề</th>
					<th>Link</th>
					<th style="width: 16px;"></th>
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
					<td><?= $slider['caption'] ?>
					<td><a href="<?= $slider['link'] ?>" title="Click"><?= $slider['link'] ?></a></td>
					
					<?php if ( $slider['publish'] == 1 ): ?>
						<td><?= Html::a( "", "{$url}/publish/{$slider['id']}", ['class' => 'glyphicon glyphicon-ok table-update', 'data-method' => 'post', 'title' => 'Công khai'] ) ?></td>						
					<?php else: ?>
						<td><?= Html::a( "", "{$url}/publish/{$slider['id']}", ['class' => 'glyphicon glyphicon-remove table-update', 'data-method' => 'post', 'title' => 'Không công khai'] ) ?></td>						
					<?php endif; ?>
					
					<td><a class="glyphicon glyphicon-pencil" title="Sửa" href="<?= "{$url}/edit/{$slider['id']}" ?>"></a></td>
					<td><?= Html::a( "", "{$url}/remove/{$slider['id']}", ['class' => 'glyphicon glyphicon-trash table-update', 'data-method' => 'post', 'title' => 'Xóa'] ) ?></td>					
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