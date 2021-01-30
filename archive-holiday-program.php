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
            <div class="row ">
                <header class="hp-header">
                    <h2 class="hp-time-title">Running throughout February and April</h2>
                </header>
                <div class="separator"> </div>
                <?php
                $currentEvents = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'post_type' => 'holiday-program',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ));
                if ($currentEvents->have_posts()) :
                    /* Start the Loop */
                    while ($currentEvents->have_posts()) : $currentEvents->the_post();

                        get_template_part('template-parts/content-holiday-program', get_post_format());

                    endwhile;
                    wp_reset_postdata();
                    $id = 584;
                    $page_pircing =  get_post($id);

                    $content = apply_filters('the_content', $page_pircing->post_content); ?>
                    <article id='post-<?php echo $id ?>' class="post-<?php echo $id ?> holiday-program type-holiday-program status-publish has-post-thumbnail hentry category-holiday-program">
                        <div class="post-item">
                            <header class="entry-header">
                                <h2><?php echo apply_filters('the_title', $page_pircing->post_title); ?></h2>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <?php echo $content ?>
                            </div><!-- .entry-content -->
                        </div>
                    </article>
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
