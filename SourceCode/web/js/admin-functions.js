$(function(){
	
	// PAGE MANAGEMENT
	/*
	$('.page-publish').on('click', function(){
		var pageId = $('.page-publish').attr('page-id');
		
		$.post('index.php?r=admin/page/publish&id=' + pageId, function (result){
			if(result) { //Boolean
				$(this).removeClass('glyphicon-remove');
				$(this).addClass('glyphicon-ok');
			} else {
				$(this).removeClass('glyphicon-ok');
				$(this).addClass('glyphicon-remove');
			}
		});		
	});
	
	$('.page-del').on('click', function(){
		if(!confirm('Bạn có chắc muốn xóa trang này'))
			return;
		
		var pageId = $('.page-publish').attr('page-id');
		
		$.post('index.php?r=admin/page/remove&id=' + pageId);
	});
	*/
});