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
            <?php if (current_user_can('read_group_5_to_7')) :
                get_template_part('template-parts/content-header-group', get_post_format());
            endif; ?>
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
                        <p>The 5-7 year old (Creative Drama Juniors) will be working each week on a new book. Exploring the story, the characters and indeed the themes and ultimately acting the story out. The books are filmed and you will have access to all the terms videos once you are logged onto the Creative Drama Juniors page. At the end of the film the students are asked to work on some tasks in preparation for the for the live Zoom session. </p>
                        <div class="video-container">
                            <p>If you are not a member, watch this video to see what we do.</p>
                            <?php
                            $your_query = new WP_Query('pagename=5-7 year olds');
                            // "loop" through query (even though it's just one page) 
                            while ($your_query->have_posts()) : $your_query->the_post();
                                get_template_part('template-parts/content', 'notlogged');

                            endwhile;
                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <?php
            if (current_user_can('read_group_5_to_7') &&  wp_count_posts('firstgroup')->publish > 4) : ?>
                <div class="pagination">
                    <?php
                    /**
                     * Hook - act_outs_pagination_action.
                     *
                     * @hooked act_outs_pagination 
                     */

                    echo paginate_links(); ?>
                </div>
            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

</div><!-- .wrapper/.page-section-->
<?php get_footer();
