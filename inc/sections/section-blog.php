<?php

/**
 * Template part for displaying Upcoming Event Section
 *
 *@package act-outs
 */
?>
<?php
$blog_post_title    = act_outs_get_option('blog_title');
for ($i = 1; $i <= 3; $i++) :
    $blog_post_posts[] = absint(act_outs_get_option('blog_post_' . $i));
endfor;
$blog_image = act_outs_get_option('background_blog_section');

?>
<div class="wrapper">
    <?php if (!empty($blog_post_title)) : ?>
        <div class="section-header">
            <?php if (!empty($blog_post_title)) : ?>
                <h2 class="section-title"><?php echo esc_html($blog_post_title); ?></h2>
            <?php endif; ?>
        </div>
    <?php endif;
    ?>

    <div class="section-content clear col-3">
        <?php
        $args = array(
            'post_type'     => 'post',
            'post_per_page' => 3,
            'post__in'      => $blog_post_posts,
            'orderby'       => 'post__in',
            'ignore_sticky_posts' => true,
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :

            while ($loop->have_posts()) : $loop->the_post(); ?>

                <article>

                    <div class="post-items">
                        <div class="entry-container">
                            <a href="<?php the_permalink(); ?>">
                                <div class='blog-image'>
                                    <?php the_post_thumbnail(); ?></div>
                            </a>
                            <header class="entry-header">
                                <h2 class="entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <?php
                                $excerpt = act_outs_the_excerpt(20);
                                echo wp_kses_post(wpautop($excerpt));
                                ?>
                                <a class="link-read" href="<?php the_permalink(); ?>">Read more</a>
                            </div><!-- .entry-content -->

                            <div class="cat-links">
                                <h5><?php echo esc_html__('Category: ', 'act-outs'); ?></h5><span><?php act_outs_entry_meta(); ?></span>
                            </div>

                        </div><!-- .entry-container -->
                    </div><!-- .post-wrapper -->
                </article>

            <?php
            endwhile; ?>
        <?php wp_reset_postdata();
        endif; ?>
    </div>
</div>