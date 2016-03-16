
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		/****************** BANNERS ************************/

		//# Banner Home - libreria bootstrap #
		j('#carousel-banner-home').carousel({
			interval: 5000
		});

		//Carousel Servicios en el Home - libreria bxSlider
		var slider_service = j('#carouserl-services-home').bxSlider({
			auto        : true,
			autoDelay   : 1500,
			controls    : false,
			infiniteLoop: true,
			maxSlides   : 3,
			slideMargin : 80,
			slideWidth  : 310,
			pager       : true,
		});

		j('#service-prev').on('click',function(){
	   		slider_service.goToPrevSlide();
	      	return false;
	    });

	    j('#service-next').on('click',function(){
	      	slider_service.goToNextSlide();
	      	return false;
	    });

		

		/****************** GALERIA  ************************/
		//Imagenes en la seccion servicios
		j("a.grouped_elements").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});

		/****************** VALIDAR FORMULARIO DE CONTACTO  ************************/

		j('#form-contact').validarium();


	});

})(jQuery)