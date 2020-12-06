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
    <div id="primary" class="content-area archive-group">
        <main id="main" class="site-main blog-posts-wrapper" role="main">
            <div class="col-3 height">

                <?php
                if (have_posts()) :
                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        /*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
                        get_template_part('template-parts/content-group', get_post_format());

                    endwhile;
                else :

                    get_template_part('template-parts/content', 'empty');

                endif; ?>
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

</div><!-- .wrapper/.page-section-->
<?php get_footer();
