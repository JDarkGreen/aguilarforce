
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		/****************** BANNERS ************************/

		//# Banner Home - libreria bootstrap #
		j('#carousel-banner-home').carousel({
			interval: 5000
		});

		//Carousel Servicios en el Home - libreria bxSlider
		j('#carouserl-services-home').bxSlider({
			minSlides  : 1,
			maxSlides  : 3,
			moveSlides : 3,
			slideMargin: 80,
			controls   : false,
			slideWidth : 310
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