    /*------------------------------------------------
                SLICK SLIDER
    ------------------------------------------------*/
    jQuery(document).ready(function ($) {
        var featured_slider = $('.featured-slider-wrapper');
        featured_slider.slick({
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
              speed : 1000,
              ease : 'Pow4.easeIn',
              autoplay: true,
        });

  
    })

          
