<?php

/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package EventBell
 */

if (!function_exists('act_outs_doctype')) :

    function act_outs_doctype()
    { ?>

        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>
    <?php }
endif;
add_action('act_outs_action_doctype', 'act_outs_doctype', 10);
// head
if (!function_exists('act_outs_head')) :
    function act_outs_head()
    {
    ?>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif;
    }
endif;
add_action('act_outs_action_head', 'act_outs_head', 10);

// add start page
if (!function_exists('act_outs_page_start')) :
    function act_outs_page_start()
    { ?>
        <div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'act-outs'); ?></a>
        <?php }
endif;
add_action('act_outs_action_before', 'act_outs_page_start', 10);
// start header
if (!function_exists('act_outs_header_start')) :
    function act_outs_header_start()
    { ?>
            <header id="masthead" class="site-header nav-shrink" role="banner">
            <?php   }
    endif;
    add_action('act_outs_action_before_header', 'act_outs_header_start');
    // end header
    if (!function_exists('act_outs_header_end')) :
        function act_outs_header_end()
        { ?>
            </header>
        <?php  }
    endif;
    add_action('act_outs_action_header', 'act_outs_header_end', 15);
    if (!function_exists('act_outs_content_start')) :
        function act_outs_content_start()
        { ?>
            <div id="content" class="site-content">
            <?php }
    endif;
    add_action('act_outs_action_before_content', 'act_outs_content_start', 10);
    if (!function_exists('act_outs_footer_start')) :
        function act_outs_footer_start()
        {
            if (!(is_home() || is_front_page())) {
                echo '</div>';
            }

            ?>
            </div>
            <footer id="colophon" class="site-footer" role="contentinfo">
                <?php if (true === act_outs_get_option('scroll_top_visible')) : ?>
                    <div class="backtotop"><i class="fa fa-chevron-up"></i></div>
                <?php endif;
            }
        endif;
        add_action('act_outs_action_before_footer', 'act_outs_footer_start');
        // footer end
        if (!function_exists('act_outs_footer_end')) :
            function act_outs_footer_end()
            { ?>
            </footer>
    <?php  }
        endif;
        add_action('act_outs_action_after_footer', 'act_outs_footer_end', 100);
