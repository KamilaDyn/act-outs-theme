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
        'posts_per_page' => 6,
        'post_type' => 'event',
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

            <div class="slick-item" style="position: relative;">
                <div class="img-slider-cotainer">
                    <?php the_post_thumbnail('full') ?>
                </div>
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
                    <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                        <header class="entry-header">
                            <div class="entry-meta">
                                <?php act_outs_entry_meta(); ?>
                            </div><!-- .entry-meta -->

                            <a href="<?php the_permalink(); ?>">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                            </a>
                        </header>
                        <div class="separator"></div>
                        <div class="entry-meta">
                            <h3> <?php
                                    $eventDate = new DateTime(get_field('event_start'));
                                    echo  $eventDate->format('d/m/Y') . 'r'; ?></h3>


                        </div><!-- .entry-meta -->
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                        </div><!-- .read-more -->

                    </div><!-- .featured-content-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- .slick-item -->
        <?php endwhile; ?>
    <?php wp_reset_postdata();
    endif; ?>
</div><!-- .featured-slider-wrapper -->