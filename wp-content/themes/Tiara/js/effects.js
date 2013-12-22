jQuery(document).ready(function() {

/* Banner class */

	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');

 
/* Navigation */
	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	

/* Slider */	
	
	jQuery('.flexslider').flexslider({
		controlNav: false
		});
	
/* Home effects	 */
  jQuery('.postim').mouseenter(function(e) {
        jQuery(this).children('a').children('img').animate({ height: '250', width: '250', left:'-25', top:'-25' }, 300);
 
    }).mouseleave(function(e) {
        jQuery(this).children('a').children('img').animate({ height: '200', left: '0', top: '0', width: '200'}, 300);
       
    });
	
/* Fancy that	 */
	jQuery(".picshot").fancybox({
		'titleShow' : false,
		'transitionIn' : 'elastic',
		'transitionOut' : 'elastic',
		'easingIn' : 'easeOutBack',
		'easingOut' : 'easeInBack'
	}); 	
	
});

