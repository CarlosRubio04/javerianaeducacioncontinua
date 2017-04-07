//* Autor: Esteban Vera
// Twitter: @kiokotzu
// Email:esteban.vg@outlook.com

$(function(){
	
	$('select').styleSelect();

	/* SCROLL TOP */
	$(window).bind('scroll',function(){
		var scroll = $(window).scrollTop();
		if(scroll > 100){
			$('header').removeClass('header-hide');
			$('header').addClass('header-show');
		} else if( scroll > 50){
			$('header').removeClass('header-show');
			$('header').addClass('header-hide');
		} else{
			$('header').removeClass('header-hide header-show');
		}
	});

});