jQuery(document).ready(function ($) {

    /*------------------------------------------------
                MAIN NAVIGATION
    ------------------------------------------------*/

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 1) {
            $("#masthead").addClass("nav-shrink");
        } else {
            $("#masthead").removeClass("nav-shrink");
        }
    });



    $('.main-navigation .nav-menu .menu-item-has-children > a').after($('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>'));

    $('button.dropdown-toggle').click(function () {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
        $(this).children('.fa-angle-down').toggleClass('rotate');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        } else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

 /*-----------------------------------
    DISABLE RIGHT CLICK prevent downolad video
    -------------------------*/

    $('.wp-video').bind("contextmenu", function (e) {
        return false;
    });
    $('.video').bind("contextmenu", function (e) {
        return false;
    });

    /*------------------------------------------------
                    END JQUERY
    ------------------------------------------------*/
   
 
});