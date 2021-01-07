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

            <div class="entry-container no-feature-image">

                <div class="entry-content">
                    <?php
                    // $excerpt = act_outs_the_excerpt(150);
                    // echo wp_kses_post(wpautop($excerpt));
                    echo force_balance_tags(html_entity_decode(wp_trim_words(htmlentities(get_the_content()), 120)));
                    ?>
                </div><!-- .entry-content -->
                <div class="separator">
                </div>

                <a class="btn" href="<?php echo get_permalink(); ?>">Read more</a>
            </div>
        </div><!-- .section-content -->

    <?php
    endwhile;
    wp_reset_postdata();
    ?>
</div>