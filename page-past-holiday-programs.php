<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */

get_header(); ?>
<div class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main  blog-posts-wrapper" role="main">
            <div class="row flex">
                <?php
                $today = date('Ymd');
                $pastEvents = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'post_type' => 'holiday-program',
                    'meta_key' => 'event_start',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_start',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric',
                        )
                    )
                ));
                while ($pastEvents->have_posts()) : $pastEvents->the_post();

                    get_template_part('template-parts/content-holiday-program', get_post_format());


                endwhile; // End of the loop.
                wp_reset_postdata();
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
</div>
<?php
get_footer();
