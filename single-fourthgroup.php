<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EventBell
 */

get_header(); ?>
<div class="wrapper page-section">
    <div id="primary " class="content-area">
        <main id="main" class="site-main site-group" role="main">

            <?php
            while (have_posts()) : the_post();

                get_template_part('template-parts/content-group-single', 'single');


                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

                the_post_navigation();
            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

</div>
<?php get_footer();
