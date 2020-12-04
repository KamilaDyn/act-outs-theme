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

<div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "speed": 400, "dots": true, "arrows":true, "autoplay": false, "fade": false }'>
    <?php
    $args = array(
        'posts_per_page' => 6,
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => 1,
    );
    if (absint($slider_category) > 0) {
        $args['cat'] = absint($slider_category);
    }

    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>

            <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
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
                <div class="wrapper">
                </div>

            </article><!-- .slick-item -->
        <?php endwhile; ?>
    <?php wp_reset_postdata();
    endif; ?>
</div><!-- .featured-slider-wrapper -->