<?php

/**
 * Template part for displaying Featured Slider Section
 *
 *@package act-outs
 */

// $video = act_outs_get_option('welcome_video');
$welcome_title = act_outs_get_option('welcome_title');
$class = 'welcome-video';
$content = apply_filters('the_content', get_the_content());
$video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
$welcome_video_post = act_outs_get_option('welcome_video');

?>

<div class="wrapper">

    <div class="slick-item">
        <div class="<?php echo esc_attr($class); ?>  featured-content-wrapper ">

            <header class="section-header">
                <h2 class="section-title"><?php echo esc_html($welcome_title); ?></h2>
            </header>
            <?php $args = array(
                'posts_per_page' => 1,
                'post_type' => 'page',
                'p' => $welcome_video_post,
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="responsive-container ">
                    <div class="img-preloader">
                        <div class="img"><img src="<?php the_post_thumbnail_url('video-poster-welcome'); ?>">
                        </div>
                        <div class="light">
                            <div class="container-btn">
                                <button class="closebtn">x</button>
                            </div>

                            <?php
                            $media = get_media_embedded_in_content(
                                apply_filters('the_content', get_the_content())
                            );
                            the_content('video');
                            ?>
                        </div>
                        <span class="watch play-icon"><img src="<?php echo get_theme_file_uri('/assets/images/play-arrow.svg') ?>" alt="play-icon" title='play video'></span>


                    </div>


                    <!-- Video Content -->


                </div><!-- .featured-slider-wrapper -->
                <!-- .end video content -->

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

</div>