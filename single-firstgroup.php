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
            <?php if (current_user_can('read_group_5_to_7')) :
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content-group-single', 'single');



                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    the_post_navigation();

                endwhile; // End of the loop.
                wp_reset_postdata();
            else :
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="row flex">
                        <div class="not-logged ">
                            <h1>Course</h1>
                            <h3>Group 5-7 year olds</h3>
                            <p> You are not logged in. <a href="<?php echo wp_login_url(); ?>">Log in</a> or choose your group:</p>
                            <ul>
                                <li><a href="<?php echo esc_url(site_url('/courses/7-9year-olds')); ?>">7-9 year-olds</a></li>
                                <li><a href="<?php echo esc_url(site_url('/courses/9-13year-olds')); ?>">9-13 year olds</a></li>
                                <li><a href="<?php echo esc_url(site_url('/courses/13-16year-olds')); ?>">13-16 year olds</a></li>
                            </ul>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

</div>
<?php get_footer();
