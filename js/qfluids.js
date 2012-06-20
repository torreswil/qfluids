function sidebar_position(){
	var win_width = $(window).width();
	var x_pos = (win_width - 1200)/2;
	if(win_width >= 1200){
		$('.sidebar').css('left',x_pos).show();
	}else{
		$('.sidebar').css('left',0).show();
	}
}

$(window).resize(function(){
	console.log($('.qfluids_wrapper').position().left);
	sidebar_position();	
});

$(document).ready(function(){
	sidebar_position();

	//CLICK EN UN ENLACE DE LA BARRA LATERAL
	$('.nav_links a').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('.this_panel').hide();
		$(target).show();
	});
});