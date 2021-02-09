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
            <?php if (current_user_can('read_group_9_to_13')) :
                get_template_part('template-parts/content-header-group', get_post_format());
            endif; ?>
            <div class="row flex">
                <?php if (current_user_can('read_group_9_to_13')) : ?>
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
                        <h3>Group 9-13 year olds</h3>
                        <p>The 9-13 year old (Performance Drama Juniors) is a performance based course where we look much more at the skills of the actor. We are doing this in various ways. We are using books and music as a stimulus to devise projects, explore emotions, work on monologue preparation, we are looking at how an actor prepares, and also creating a show that can either be filmed or work online. All videos and materials can be found on the Performance Drama Juniors page, once you are logged in.</p>
                        <div class="video-container">
                            <p>If you are not a member, watch this video to see what we do.</p>
                            <?php
                            $your_query = new WP_Query('pagename=9-13 year olds');
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
            <?php if (current_user_can('read_group_9_to_13') &&   wp_count_posts('thirdgroup')->publish > 4) : ?>
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
