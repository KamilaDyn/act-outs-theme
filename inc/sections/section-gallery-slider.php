<?php

/**
 * Template part for displaying Featured Slider Section
 *
 *@package act-outs
 */

$slider_category = act_outs_get_option('slider_gallery_category');
$image_overlay   = act_outs_get_option('disable_white_overlay');
$class = '';

?>
<div class="wrapper">

    <div class="featured-slider-wrapper" data-slick='{"dots":true, "fade":false}'>
        <?php $args = array(
            'posts_per_page' => 4,
            'post_type' => 'gallery-slider',
            'post_status' => 'publish',
            'paged' => 1,
            'orderby' => 'meta_value_num',
            'order' => 'ASC',

        );
        if (absint($slider_category) > 0) {
            $args['cat'] = absint($slider_category);
        }

        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
            $i = 0;
            while ($loop->have_posts()) : $loop->the_post();
                $i++; ?>
                <figure>
                    <?php
                    the_post_thumbnail('vertical-large');
                    ?>
                </figure>

            <?php endwhile; ?>
        <?php wp_reset_postdata();
        endif; ?>

    </div><!-- .featured-slider-wrapper -->
</div>