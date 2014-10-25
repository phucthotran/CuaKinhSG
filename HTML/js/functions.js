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
	
	//Load google map
	new Maplace({
			locations: [{ lat: 10.780379, lon: 106.63652, zoom: 16 }],
			controls_on_map: false,
			show_infowindow: false,
			map_options: {
				scrollwheel: false
			}
	}).Load();
	
});
