<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */

?>

<section class="no-results not-found not-found-empty">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'act-outs'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if (is_archive() && current_user_can('publish_posts')) : ?>

            <p><?php printf(wp_kses(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'act-outs'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>

        <?php elseif (is_search()) : ?>

            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'act-outs'); ?></p>
        <?php
            get_search_form();

        else : ?>

            <p><?php esc_html_e('Sorry, but nothing added yet. Please wait a little bit, and check us later. Enjoy a day &#128512;', 'act-outs'); ?></p>
        <?php

        endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->