jQuery(document).ready(function ($) {
    $(window).on("load", function () {

        var urlHash = window.location.href.split("#")[1];

        if (urlHash && $('#' + urlHash).length) {

            $('html,body').animate({
                scrollTop: $('#' + urlHash).offset().top - 70
            }, 300);
        }
    });
});