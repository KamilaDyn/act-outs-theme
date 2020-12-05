<?php

/**
 * Template part for displaying Author Section
 *
 *@package act-outs
 */
?>
<?php
$message_id = act_outs_get_option('message_page');
$args = array(
    'post_type'     => 'page',
    'posts_per_page' => 1,
    'p' => $message_id,

);

$the_query = new WP_Query($args);

// The Loop
while ($the_query->have_posts()) : $the_query->the_post();
?>
    <div class="section-content">
        <?php if (has_post_thumbnail()) : ?>
            <div class="author-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <div> <img class="img" src="<?php the_post_thumbnail_url('full'); ?>"></div>
                </a>
            </div><!-- .author-thumbnail -->
        <?php endif;
        $message_class = '';
        if (!has_post_thumbnail()) {
            $message_class = 'no-feature-image';
        } ?>
        <div class="entry-container <?php echo $message_class; ?>">
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="entry-content">
                <?php
                $excerpt = act_outs_the_excerpt(75);
                echo wp_kses_post(wpautop($excerpt));
                ?>
            </div><!-- .entry-content -->

            <div class="separator"></div>
            <?php act_outs_render_social_links() ?>
        </div>
    </div><!-- .section-content -->
<?php endwhile;
wp_reset_postdata(); ?>