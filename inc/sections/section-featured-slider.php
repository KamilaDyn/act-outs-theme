<?php

/**
 * Template part for displaying Featured Slider Section
 *
 *@package act-outs
 */

$slider_category = act_outs_get_option('slider_category');
$image_overlay   = act_outs_get_option('disable_white_overlay');
$class = '';
$slider_section_title = act_outs_get_option('slider_title');

if (!empty($slider_section_title)) : ?>
    <header class="section-header">
        <h2 class="section-title"><?php echo esc_html($slider_section_title); ?></h2>
    </header>
<?php endif; ?>
<div class="section-content col-2">
    <div class="featured-slider-wrapper">
        <?php
        $args = array(
            'posts_per_page' => 15,
            'post_type' => 'holiday-program',
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
                        <a href="https://actouts.com//holiday-programs/#post-<?php the_ID() ?> " class="btn btn-primary">Read more</a>
                    </div><!-- .read-more -->
                </div>




            <?php endwhile; ?>
        <?php wp_reset_postdata();
        endif; ?>
    </div><!-- .featured-slider-wrapper -->
</div>