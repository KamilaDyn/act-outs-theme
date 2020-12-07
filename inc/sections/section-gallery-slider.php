<?php

/**
 * Template part for displaying Featured Slider Section
 *
 *@package act-outs
 */

$slider_category = act_outs_get_option('slider_category');
$image_overlay   = act_outs_get_option('disable_white_overlay');
$class = '';

?>
<div class="wrapper">

    <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": false }'>


        <?php for ($i = 1; $i <= 4; $i++) :
            $images_post = act_outs_get_option('gallery_image_' . $i); ?>
            <div class="slick-item" style="background-image: url('<?php echo esc_url($images_post); ?> ?>');">
                <?php
                $class = '';
                if (false == $image_overlay) {
                    $class = 'image-overlay';
                } else {
                    $class = 'content-overlay';
                }
                if (false == $image_overlay) {
                ?>
                    <div class="overlay"></div>
                <?php } ?>


            </div><!-- .slick-item -->
        <?php
        endfor; ?>
    </div><!-- .featured-slider-wrapper -->
</div>