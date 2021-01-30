<?php

/**
 * Template part for displaying Featured Slider Section
 *
 *@package act-outs
 */

// $video = act_outs_get_option('welcome_video');
$welcome_title = act_outs_get_option('welcome_title');
$class = 'welcome';

?>

<div class="wrapper">
    <header class="section-header">
        <h2 class="section-title"><?php echo esc_html($welcome_title); ?></h2>
    </header>

    <?php
    $message_id = act_outs_get_option('welcome_page');
    $args = array(
        'post_type'     => 'page',
        'posts_per_page' => 1,
        'p' => $message_id,
    );

    $query  = new WP_Query($args);
    while ($query->have_posts()) : $query->the_post(); ?>
        <div class="section-content">

            <?php $message_class = '';
            if (!has_post_thumbnail()) {
                $message_class = 'no-feature-image';
            } ?>
            <div class="entry-container <?php echo $message_class; ?>">

                <div class="entry-content">

                    <?php
                    if (has_excerpt()) {
                        the_excerpt();
                    ?>
                    <?php
                    } else {
                        echo force_balance_tags(html_entity_decode(wp_trim_words(htmlentities(get_the_content()), 120)));
                    }
                    ?>

                </div><!-- .entry-content -->
                <div class="separator"> </div>
                <a class="btn" href="<?php echo get_permalink(); ?>">Read more</a>

            </div>
            <?php if (has_post_thumbnail()) : ?>

                <div class="thumbnail ">
                    <?php the_post_thumbnail('single-page-image'); ?>
                </div>
            <?php endif; ?>
        </div><!-- .section-content -->

    <?php endwhile;
    wp_reset_postdata();
    ?>
</div>