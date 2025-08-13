/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";

    // responsive menu js
    $(".responsive-menu").click(function() {
        $(".main-navigation").addClass("mobile-menu");
        $(".menu-bars").addClass("hide-menubar");
    });
    $(".responsive-menu-close").click(function() {
        $(".main-navigation").removeClass("mobile-menu");
        $(".menu-bars").removeClass("hide-menubar");
    });


    // FAQs js
    // $('.faq-cat-list').click(function() {
    //     const value = $(this).attr('data-filter');
    //     $('.faqBox').not('.'+value).hide('1000');
    //     $('.faqBox').filter('.'+value).show('1000');
    // })
    // $('.faq-cat-list').click(function() {
    //     $(this).addClass('active').siblings().removeClass('active');
    // })

    $("#distributorToggle, .distributor-selection-field .fa-arrow-down").click(function(){
        $(".distributor-open").toggleClass("activelist");
    });

    $('.distributor-cat-list').click(function() {
        const value = $(this).attr('data-filter');
        $('.single-distributor-item').not('.'+value).hide('1000');
        $('.single-distributor-item').filter('.'+value).show('1000');
        $(this).addClass('active').siblings().removeClass('active');
		$(".distributor-open").toggleClass("activelist");
    });

    $('.distributor-cat-list').click(function() {
        $(".all-distributors").addClass('active');
    });

    $('.activelist .distributor-cat-list').click(function() {
        $(".distributor-filter-cats").addClass('none');
    });

    $(document).ready(function(){
		
		document.addEventListener( 'wpcf7mailsent', function( event ) {
				
			let redirectLink = false;

			if(event.detail.contactFormId == 556)
			{
				redirectLink = window.links.thankyoucontact;
			}

			if(event.detail.contactFormId == 767)
			{
				redirectLink = window.links.thankyoudistributor;
			}

			if(event.detail.contactFormId == 1139)
			{
				redirectLink = window.links.thankyousubscribe;	
			}

			if(redirectLink)
			{
				setTimeout( () => {
					location = redirectLink;
				}, 300 );
			}

		}, false );
		
	});


}(jQuery));