/***Footer-JS*****/

$(function () {
	$('.pili, .elemie, .about, .contact').click(function () {
		 if ($(window).width() < 1024) {
		$(this).next('ul.footer-list').slideToggle();
		if( jQuery(this).hasClass('active') ){

			$('.footer-name').removeClass('active');
		
		} else {
			$('.footer-name').removeClass('active');
			$(this).addClass("active");
		}
		
		 
		$(this).parent().siblings().children().next().slideUp();
		return false;
		}
		
	});

	jQuery('#about-sidebar-menu-toggle').click(function(){ 
		jQuery('#about-sidebar-menu-items').slideToggle();

		if(jQuery('#about-sidebar-menu-toggle').hasClass('inactive'))
	    {
	    	jQuery('#about-sidebar-menu-toggle').removeClass('inactive');
	    	jQuery('#about-sidebar-menu-toggle').addClass('active');
	    } else {
	    	jQuery('#about-sidebar-menu-toggle').removeClass('active');
	    	jQuery('#about-sidebar-menu-toggle').addClass('inactive');
	    }
	});
	
	$('.discount-code-link').click(function() {
		$('.coupon').show();
		$('.discount-code-link').hide();
	});
	
	$('.review-remove').click(function(){
		$('#review_form_wrapper').hide();
		$('.review-comments').show();
	});
	
	$('.write-review').click(function(){
		$('.review-comments').hide();
		$('#review_form_wrapper').show();
	});
	
	$('.remove-message').click(function(){
		$('.woocommerce-message').hide();
	});
	
	$('.remove-info').click(function(){
		$('.woocommerce-info').hide();
	});
	
});

	$(document).ready(function(){
		$(".carousel-indicators li:first").addClass("active");
		$(".carousel-inner .item:first").addClass("active");
	});
	
	$(function(){
		$(".woocommerce-checkout #payment ul.payment_methods li img").attr('src', "../images/paypal.png");
		
	});
	

	
$(function () {
	$('.carousel-inner').each(function() {
		if ($(this).children('.item').length === 1) $(this).siblings('.carousel-control').hide();

	});

});
	
	



  