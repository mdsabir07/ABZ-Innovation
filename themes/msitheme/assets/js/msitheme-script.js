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

    // Event js
    $('.event-cat-list').click(function() {
        const value = $(this).attr('data-filter');
        $('.eventBox').not('.'+value).hide('1000');
        $('.eventBox').filter('.'+value).show('1000');
    })
    $('.event-cat-list').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    })

    // FAQs js
    $('.faq-cat-list').click(function() {
        const value = $(this).attr('data-filter');
        $('.faqBox').not('.'+value).hide('1000');
        $('.faqBox').filter('.'+value).show('1000');
    })
    $('.faq-cat-list').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    })

    // Dealer js
    $('.dealer-cat-list').click(function() {
        const value = $(this).attr('data-filter');

        if (value === 'all') {
            $('.dealerBox').show('1000');
        } else {
            $('.dealerBox').not('.'+value).hide('1000');
            $('.dealerBox').filter('.'+value).show('1000');
        }
    })
    $('.dealer-cat-list').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    })

    // Product power slider 1
    $(".power-slider1").not('.slick-initialized').slick({
        dots: false,
        loop: true,
        arrows: true,
        nextArrow: "<i class=\'fa fa-arrow-right arrow-right cursor-pointer text-center absolute\'></i>",
        prevArrow: "<i class=\'fa fa-arrow-left arrow-left cursor-pointer text-center absolute\'></i>",
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    // Product power slider 2
    $(".power-slider2").not('.slick-initialized').slick({
        dots: false,
        loop: true,
        arrows: true,
        nextArrow: "<i class=\'fa fa-arrow-right arrow-right cursor-pointer text-center absolute\'></i>",
        prevArrow: "<i class=\'fa fa-arrow-left arrow-left cursor-pointer text-center absolute\'></i>",
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    // Product power slider 3
    $(".power-slider3").not('.slick-initialized').slick({
        dots: false,
        loop: true,
        arrows: true,
        nextArrow: "<i class=\'fa fa-arrow-right arrow-right cursor-pointer text-center absolute\'></i>",
        prevArrow: "<i class=\'fa fa-arrow-left arrow-left cursor-pointer text-center absolute\'></i>",
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    // Product power slider 4
    $(".power-slider4").not('.slick-initialized').slick({
        dots: false,
        loop: true,
        arrows: true,
        nextArrow: "<i class=\'fa fa-arrow-right arrow-right cursor-pointer text-center absolute\'></i>",
        prevArrow: "<i class=\'fa fa-arrow-left arrow-left cursor-pointer text-center absolute\'></i>",
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    // Product power slider 5
    $(".power-slider5").not('.slick-initialized').slick({
        dots: false,
        loop: true,
        arrows: true,
        nextArrow: "<i class=\'fa fa-arrow-right arrow-right cursor-pointer text-center absolute\'></i>",
        prevArrow: "<i class=\'fa fa-arrow-left arrow-left cursor-pointer text-center absolute\'></i>",
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        speed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

}(jQuery));