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

$query  = new WP_Query($args);

// The Loop
while ($query->have_posts()) :   $query->the_post(); ?>
    <header class="section-header">
        <h2 class="section-title"><?php the_title(); ?></h2>
    </header>

    <div class="section-content">
        <?php if (has_post_thumbnail()) : ?>

            <div class="author-thumbnail ">
                <?php the_post_thumbnail('single-page-image'); ?>
            </div>
        <?php endif;
        $message_class = '';
        if (!has_post_thumbnail()) {
            $message_class = 'no-feature-image';
        } ?>
        <div class="entry-container <?php echo $message_class; ?>">

            <div class="entry-content">

                <?php
                $excerpt = act_outs_the_excerpt(85);
                if (has_excerpt()) {
                    the_excerpt();
                } else {
                    echo wp_kses_post(wpautop($excerpt));
                }

                ?>
            </div><!-- .entry-content -->
            <div class="separator">
            </div>
            <?php act_outs_render_social_links() ?>

            <a class="btn" href="<?php echo get_permalink(); ?>">Read more</a>
        </div>
    </div><!-- .section-content -->
<?php endwhile;
wp_reset_postdata(); ?>