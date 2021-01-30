<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */

get_header();
$content = apply_filters('the_content', get_the_content());
$video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe')); ?>
<div class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main blog-posts-wrapper" role="main">
            <div class="row ">
                <header class="hp-header">
                    <h2 class="hp-time-title"><?php the_archive_title(); ?></h2>
                </header>
                <div class="separator"> </div>
                <div class="featured-videos-container">
                    <?php
                    $featuredVideos = new WP_Query(array(
                        'paged' => get_query_var('paged', 1),
                        'post_type' => 'featured-videos',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ));
                    if ($featuredVideos->have_posts()) :
                        /* Start the Loop */
                        while ($featuredVideos->have_posts()) : $featuredVideos->the_post(); ?>

                            <?php
                            $img_class = '';

                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="post-item">
                                    <div class="entry-container">


                                        <div class="entry-content">
                                            <?php
                                            $media = get_media_embedded_in_content(
                                                apply_filters('the_content', get_the_content())
                                            );
                                            echo $media[0];
                                            ?>
                                        </div><!-- .entry-content -->
                                        <header class="entry-header">
                                            <h3><?php the_title() ?></h3>
                                        </header><!-- .entry-header -->

                                    </div><!-- .entry-container -->
                                </div><!-- .post-item -->
                            </article><!-- #post-## -->
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                </div>
            <?php
                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
            ?>

            </div>

            <?php
            /**
             * Hook - act_outs_pagination_action.
             *
             * @hooked act_outs_pagination 
             */
            do_action('act_outs_pagination_action');
            // the_posts_navigation(); 
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar('event-archive'); ?>
</div><!-- .wrapper/.page-section-->
<?php get_footer();
