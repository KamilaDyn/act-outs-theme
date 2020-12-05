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

?>

<div class="wrapper">

    <div class="slick-item">
        <div class="<?php echo esc_attr($class); ?>  featured-content-wrapper ">

            <header class="section-header">
                <h2 class="section-title"><?php echo esc_html($welcome_title); ?></h2>
            </header>
            <?php $args = array(
                'posts_per_page' => 1,
                'post_type' => 'post',
                'post_status' => 'publish',
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="responsive-container ">
                    <div class="img-preloader">
                        <div class="img"><img src="<?php the_post_thumbnail_url('video-poster'); ?>">
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
                        <figure class="wave">
                            <svg preserveAspectRatio="none" style="height: 100%; width: 100%;" viewBox="0 0 1440 320">
                                <path fill="rgba(255, 255, 255, 0.2)" d="M0,0L60,42.7C120,85,240,171,360,218.7C480,267,600,277,720,266.7C840,256,960,224,1080,192C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                                <path fill="rgba(255, 255, 255, 0.6)" fill-opacity="1" d="M0,64L48,64C96,64,192,64,288,101.3C384,139,480,213,576,224C672,235,768,181,864,176C960,171,1056,213,1152,218.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                                <path fill="rgba(255, 255, 255, 0.3)" d="M0,128L60,154.7C120,181,240,235,360,229.3C480,224,600,160,720,149.3C840,139,960,181,1080,218.7C1200,256,1320,288,1380,304L1440,320L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                            </svg>
                        </figure>

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