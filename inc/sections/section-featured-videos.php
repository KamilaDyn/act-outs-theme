<?php

/**
 * Template part for displaying Upcoming Event Section
 *
 *@package act-outs
 */
?>
<?php

$featured_video_post_title    = act_outs_get_option('featured_vidoes_title');
for ($i = 1; $i <= 2; $i++) :
    $featured_video_posts[] = absint(act_outs_get_option('featured_video_post_' . $i));
endfor;


?>
<div class="wrapper">
    <?php if (!empty($featured_video_post_title)) : ?>
        <header class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_video_post_title); ?></h2>
        </header>
    <?php endif;
    ?>

    <div class="section-content clear ">
        <div class="articles-container">
            <?php
            $args = array(
                'post_type'     => 'featured-videos',
                'post_per_page' => 2,
                'post__in'      => $featured_video_posts,
                'orderby'       => 'post__in',
                'ignore_sticky_posts' => true,
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                $i = 1;
                while ($loop->have_posts()) : $loop->the_post(); ?>

                    <article>
                        <div class="service-content ">
                            <div class="responsive-container ">

                                <div class="img-preloader">
                                    <div class="img">
                                        <?php the_post_thumbnail('video-poster'); ?>
                                        <span class="watch play-icon">
                                            <img src="<?php echo get_theme_file_uri('/assets/images/play-arrow.svg') ?>" alt="play-icon" title='play video'>

                                        </span>
                                    </div>


                                    <div class="light">
                                        <div class="container-btn">
                                            <button class="closebtn">x</button>
                                        </div>
                                        <div class="wp-video">
                                            <?php
                                            $media = get_media_embedded_in_content(
                                                apply_filters('the_content', get_the_content())
                                            );
                                            echo $media[0];
                                            ?>
                                        </div>

                                    </div>

                                </div>



                                <div class="caption">
                                    <?php $featured_video_title =  act_outs_get_option('video_title_' . $i);
                                    if (!empty($featured_video_title)) : ?>
                                        <h3><?php echo esc_attr($featured_video_title); ?></h3>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                    </article>
                    <?php $i++; ?>
                <?php
                endwhile; ?>
            <?php wp_reset_postdata();
            endif; ?>
        </div>

    </div>
    <a href="<?php echo esc_url(site_url('/featured-videos')) ?>" class="btn">See more</a>

</div>