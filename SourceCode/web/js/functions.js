$(function(){
	var duration = 500;
	
	$(window).scroll(function(){
		var offset = 200;		
		
		if($(this).scrollTop() > offset){
			$('.top-button').fadeIn(duration);			
		} else {
			$('.top-button').fadeOut(duration);
		}
	});
	
	$('.top-button').on('click', function(e){
		e.preventDefault();
		
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	});
	
	$('.navbar-toggle').on('click', function(){
		$('navbar-collapse').collapse('toggle');
	});
	
});
