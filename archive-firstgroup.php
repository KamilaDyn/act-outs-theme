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
                <?php if (current_user_can('read_group_5_to_7')) : ?>
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
                        <h3>Group 5-7 year olds</h3>
                        <p> You are not logged in. <a href="<?php echo wp_login_url(); ?>">Log in</a> or choose your group:</p>
                        <ul>
                            <li><a href="<?php echo esc_url(site_url('/courses/7-9year-olds')); ?>">7-9 year-olds</a></li>
                            <li><a href="<?php echo esc_url(site_url('/courses/9-13year-olds')); ?>">9-13 year olds</a></li>
                            <li><a href="<?php echo esc_url(site_url('/courses/13-16year-olds')); ?>">13-16 year olds</a></li>
                        </ul>
                        <div class="video-container">
                            <p>If you are not member, watch video what we do.</p>
                            <?php
                            $your_query = new WP_Query('pagename=5-7 year olds');
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
