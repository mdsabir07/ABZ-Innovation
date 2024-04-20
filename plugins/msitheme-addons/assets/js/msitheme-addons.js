/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    // CounterUp JS
    $(function () {
        $(".count").counterUp({
            delay: 5,
            time: 1000
        });
    });

    $(document).ready(function () {
        $('.popup-youtube, .popup-vimeo, .popup-media-v').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });
    });

    // Product video
    $('.product-popup-youtube, .product-popup-vimeo, .product-popup-media-v').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    // Product tab js (changing background color)
    $(".tablist-1 label").click(function () {
        $(".product-tabbed").addClass("tablist-1-active-new");
        $(".product-tabbed").removeClass("tablist-1-active");
        $(".product-tabbed").removeClass("tablist-2-active");
    });
    $(".tablist-2 label").click(function () {
        $(".product-tabbed").addClass("tablist-2-active");
    });

    // Product plus button click and change left content
    $(".fa-plus").on("click", function () {
        var id = $(this).data('target');
        var getElement = $(this).parents().find('.tab-content-left');
		getElement.find('.plus-btn-content').hide();
		getElement.find('.btn-content-' + id).show();
    });
}(jQuery));