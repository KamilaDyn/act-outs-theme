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
                <?php if (current_user_can('read_group_13_to_16')) : ?>
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
                        wp_reset_postdata();
                    else :

                        get_template_part('template-parts/content', 'empty');

                    endif;
                else : ?>
                    <div class="not-logged">
                        <h1>Course</h1>
                        <h3>Group 13-16 year olds</h3>
                        <p>The 13-16 year olds (Performance Drama Seniors) is a performance based course where the content becomes a little bit heavier than the Performance Drama Juniors. We look at books and music to create characters, scenarios and devised projects. We work on audition technique and how we execute that audition, We also look at monologue preparation and how an actor prepares. And also we creating shows, whether that will be a film or a live show that works online. All videos and materials can be found on the Performance Drama Seniors page, once you are logged in.</p>
                        <div class="video-container">
                            <p>If you are not a member, watch this video to see what we do.</p>
                            <?php
                            $your_query = new WP_Query('pagename=13-16 year olds');
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
