(function($){
	$(document).ready(function(){

		$('.main-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			fade: false,
			prevArrow: '<button type="button" class="main-slider-prev"></button>',
			nextArrow: '<button type="button" class="main-slider-next"></button>',
		});

		$(".ask-question-link").fancybox();
	});
})(jQuery)