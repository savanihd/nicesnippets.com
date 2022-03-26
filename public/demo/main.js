(function ($){
	"use strict";
	
/* Responsive menu	 */
/* jQuery('header nav').meanmenu(); */

/* WOW Animation */
new WOW().init();

/* search */ 
$('.header-icon').on('click',function(){
	$('.inner-form').slideToggle(300,'swing')
});
/* sticky menu */

$(".header-bottom-area").sticky({topSpacing:0});

/* select style */
$('select').selectpicker();

/* color piker */
/* $('#colorPanel').ColorPanel({
	styleSheet: '#cpswitch'
	, animateContainer: '#wrapper'
	, colors: {
		'#03a9f4': 'skins/default.css'
		, '#16A085': 'skins/color2.css'
		, '#16A085': 'skins/color2.css'
		, '#16A085': 'skins/color2.css'

	, }
}); */

// Easing Smooth Script 
	$('li.smooth_menu a').bind('click', function(event) {
		var $anchor = $(this);  
		var headerH ='69';
		$('html, body').stop().animate({ 
		scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
		},1200, 'easeInOutExpo');
		event.preventDefault();

	});	

/* counter	 */
$('.counter').counterUp({
    delay: 10,
    time: 1000
});	

/* parallax active */

$('.call-parallax-active').parallax("50%", 0.4);
$('.counter-parallax-active').parallax("50%", 0.4);
$('.coaching-parallax-active').parallax("50%", 0.4);
$('.parallax-active').parallax("50%", 0.4);

/*---------------------
 countdown
--------------------- */
	$('[data-countdown]').each(function() {
	  var $this = $(this), finalDate = $(this).data('countdown');
	  $this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
	  });
	});	 

/* testimonial Carousel */
$('.testimonial-active').owlCarousel({
	loop:true,
    items:1,
	dots:true,
	animateOut:'zoomOutLeft',
	animateIn: 'zoomInLeft',
	loop: true,
	autoplay: true,
    nav:false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
/* event Carousel */
$('.event-active').owlCarousel({
	loop:true,
    items:1,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

/* news Carousel */
$('.news-active').owlCarousel({
	loop:false,
    items:3,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

/* Click to Top ScrollUp */
  $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 5000, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 2000, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });
		
	
})(jQuery);