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
            <div class="row flex">
                <?php if (current_user_can('read_group_7_to_9')) : ?>
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

                    endif;
                else : ?>
                    <div class="not-logged">
                        <h1>Course</h1>
                        <h3>Group 7-9 year olds</h3>
                        <p>The 7-9 year old (Creative Drama Seniors) are working off story books and bringing those books to life. They are working on a single book for a 3 week-period. The books have much more content in terms of narrative than the Creative Drama Juniors, as this why we take 3 weeks to explore each story, the characters and indeed the themes. The books are filmed and you will have access to all the terms videos once you are logged onto the the Creative Drama Seniors page. Also, at the end of each video we ask the students to work on some tasks in preparation for the live Zoom session. </p>
                        <div class="video-container">
                            <p>If you are not a member, watch this video to see what we do.</p>
                            <?php
                            $your_query = new WP_Query('pagename=7-9 year olds');
                            // "loop" through query (even though it's just one page) 
                            while ($your_query->have_posts()) : $your_query->the_post();
                                get_template_part('template-parts/content', 'notlogged');
                            endwhile;
                            // reset post data (important!)
                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                <?php endif; ?>
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
