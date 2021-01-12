<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */

get_header(); ?>
<div class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main blog-posts-wrapper" role="main">
            <div class="row flex">

                <?php
                $today = date('Ymd');
                $currentEvents = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'post_type' => 'holiday-program',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                ));
                if ($currentEvents->have_posts()) :
                    /* Start the Loop */
                    while ($currentEvents->have_posts()) : $currentEvents->the_post();

                        /*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
                        get_template_part('template-parts/content-holiday-program', get_post_format());

                    endwhile;

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
                <h3>Looking for past Events?<a class="link" href="<?php echo site_url('/past-holiday-programs') ?>"> Check our past events archive</a></h3>
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
