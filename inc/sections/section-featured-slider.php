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

<div class="featured-slider-wrapper">
    <?php
    $today = date('Ymd');
    $args = array(
        'posts_per_page' => 15,
        'post_type' => 'holiday-program',
        'post_status' => 'publish',
        'paged' => 1,
        'meta_key' => 'event_start',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_start',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric',
            )
        )
    );
    if (absint($slider_category) > 0) {
        $args['cat'] = absint($slider_category);
    }

    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        $i = 0;
        while ($loop->have_posts()) : $loop->the_post();
            $i++; ?>
            <div class="slider-image-container">
                <figure>

                    <?php $image = get_field('hp_image_slider');
                    $size = 'vertical-large';
                    $alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
                    if ($image) {
                        $thumbnail = get_field('vertical-large', $file['ID']);
                    ?>

                        <?php echo wp_get_attachment_image($image, $size, $alt); ?>


                    <?php } else {
                        the_post_thumbnail('vertical-large');
                    } ?>
                </figure>
                <div class="read-more">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                </div><!-- .read-more -->
            </div>





        <?php endwhile; ?>
    <?php wp_reset_postdata();
    endif; ?>
</div><!-- .featured-slider-wrapper -->