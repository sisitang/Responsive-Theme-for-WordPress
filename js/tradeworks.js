/**
 * tradeworks.js
 *
 * 
 */

jQuery( document ).ready(function( $ ) {
    
    // Menu fot tablets and mobiles
    $('.site-content').wrap('<div class="outer_wrapper"></div>');
    $('.outer_wrapper').prepend('<div class="mobile_menu_dropdown"></div>');
    var $body = $('body');
    var $mobileMenu = $('.mobile_menu');
    var navLi = $('.main-navigation ul').html();

    $('.mobile_menu_dropdown').html('<div class="new_page_nav"><ul>' + navLi + '</ul></div>');

    $mobileMenu.click(function(){
            $body.toggleClass('show_menu');		
    });
    
    $('.new_page_nav >ul > li >a').each(function(i, obj) {
        var $this = $(this);
        if ( $this.parent().has("ul").length ){
            $this.addClass( "menu_arrow" );
        } 
    });
    
    $('.new_page_nav >ul > li >a').click(function(e) {
        var $this = $(this);
	if ($this.parent().has("ul").length){
		e.preventDefault();
		$(".new_page_nav ul ul").slideUp();
                $this.toggleClass('rotate_triangle_180');	  
                if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
        };
    });
    
    // Homepage slider
    $('.bxslider').bxSlider({
        auto: true,
        mode: 'fade',
        captions: true
    });
    
    // Go to Shopify
    $('.givenowbutton').click(function(){
        window.location = 'https://www.canadahelps.org/en/charities/tradeworks-bc/';
    });
    
    $('.shopbutton').click(function(){
        window.location = 'http://tradeworks.myshopify.com/';
    });    
});
