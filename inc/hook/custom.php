<?php

/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package act-outs
 */

if (!function_exists('act_outs_header_top')) :
    /**
     * Header Top
     * 
     */
    function act_outs_header_top()
    {   ?>

        <div class="header-top">
            <div class="wrapper">
                <?php $disable_contact = act_outs_get_option('disable_show_header_contact_info');
                if (true == $disable_contact) : ?>
                    <div class="container">
                        <?php

                        $email     =  act_outs_get_option('header_email');
                        $phone     =  act_outs_get_option('header_phone');

                        if ($email) echo '<a href="' . esc_url('mailto:' . sanitize_email($email)) . '" class="email"><i class="fa fa-envelope-o"></i>' . esc_html($email) . '</a>';

                        if ($phone) echo '<a href="' . esc_url('tel:' . preg_replace('/[^\d+]/', '', $phone)) . '" class="tel-link"><i class="fa fa-phone"></i>' . esc_html($phone) . '</a>';

                        ?>
                    </div>
                <?php endif;
                $disable_login_btn = act_outs_get_option('disable_show_login_btn');
                if (true == $disable_login_btn) :
                ?>
                    <div class="login-container">
                        <?php if (is_user_logged_in()) { ?>
                            <a href="<?php echo wp_logout_url(); ?>" class="btn logout-btn">Log Out</a>
                        <?php } else { ?>
                            <a href="<?php echo wp_login_url(); ?>" class="btn login-btn">Log In</a><?php
                                                                                                } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }
endif;
add_action('act_outs_action_header', 'act_outs_header_top', 10);



if (!function_exists('act_outs_site_branding')) :
    /**
     * Site Branding
     *
     * @since 1.0.0
     */
    function act_outs_site_branding()
    { ?>

        <div class="site-branding">
            <div class="site-logo">

                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
                <?php
                $sticky_logo_url = get_theme_mod('sticky_header_logo');
                if ($sticky_logo_url) : ?>
                    <a class="custom-logo-link" href="<?php echo esc_url(site_url('/')) ?>">
                        <div class="logo-alternative">
                            <?php
                            echo '<img src="' . $sticky_logo_url . '" alt = "logo alt test" class="sticky_logo_class">';
                            ?>
                        </div>
                    </a>
                <?php endif; ?>

            </div><!-- .site-logo -->
            <?php $title =  get_bloginfo('name', 'display');
            if ($title || is_customize_preview()) :
            ?>
                <div id="site-identity">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"> <?php bloginfo('name'); ?></a>
                    </h1>

                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo ($description); ?></p>
                    <?php endif; ?>
                </div><!-- #site-identity -->
            <?php endif; ?>
        </div> <!-- .site-branding -->
        <div class="wrapper">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php echo esc_attr__('Primary Menu', 'act-outs'); ?>">

                <button type="button" class="menu-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'fallback_cb'    => 'act_outs_primary_navigation_fallback',
                ));
                ?>

            </nav><!-- #site-navigation -->
        </div><!-- .wrapper -->
    <?php }
endif;
add_action('act_outs_action_header', 'act_outs_site_branding', 10);


if (!function_exists('act_outs_footer_top_section')) :

    function act_outs_footer_top_section()
    {
        $footer_sidebar_data = act_outs_footer_sidebar_class();
        $footer_sidebar    = $footer_sidebar_data['active_sidebar'];
        $footer_class      = $footer_sidebar_data['class'];
        if (empty($footer_sidebar)) {
            return;
        }      ?>
        <div class="wrapper">
            <div class="footer-widgets-area page-section <?php echo esc_attr($footer_class); ?>">
                <!-- widget area starting from here -->
                <div class="wrapper">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                    ?>
                            <div class="hentry">
                                <?php dynamic_sidebar('footer-' . $i); ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div> <!-- widget area starting from here -->
        </div>
    <?php
    }
endif;

add_action('act_outs_action_footer', 'act_outs_footer_top_section', 10);




if (!function_exists('act_outs_footer_section')) :

    /**
     * Footer copyright
     *
     * @since 1.0.0
     */

    function act_outs_footer_section()
    { ?>
        <div class="site-info">
            <?php
            $copyright_footer = act_outs_get_option('copyright_text');
            if (!empty($copyright_footer)) {
                $copyright_footer = wp_kses_data($copyright_footer);
            }
            // Powered by content.
            // Powered by content.
            ?>

            <span class="copy-right"><?php echo esc_html($copyright_footer); ?><?php echo  $powered_by_text; ?></span>
        </div> <!-- site generator ends here -->

    <?php }

endif;
add_action('act_outs_action_footer', 'act_outs_footer_section', 20);


if (!function_exists('act_outs_footer_sidebar_class')) :
    /**
     * Count the number of footer sidebars to enable dynamic classes for the footer
     *
     * @since act-outs 0.1
     */
    function act_outs_footer_sidebar_class()
    {
        $data = array();
        $active_sidebar = array();
        $count = 0;

        if (is_active_sidebar('footer-1')) {
            $active_sidebar[]   = 'footer-1';
            $count++;
        }

        if (is_active_sidebar('footer-2')) {
            $active_sidebar[]   = 'footer-2';
            $count++;
        }

        if (is_active_sidebar('footer-3')) {
            $active_sidebar[]   = 'footer-3';
            $count++;
        }

        if (is_active_sidebar('footer-4')) {
            $active_sidebar[]   = 'footer-4';
            $count++;
        }

        $class = '';

        switch ($count) {
            case '1':
                $class = 'col-1';
                break;
            case '2':
                $class = 'col-2';
                break;
            case '3':
                $class = 'col-3';
                break;
            case '4':
                $class = 'col-4';
                break;
        }

        $data['active_sidebar'] = $active_sidebar;
        $data['class']        = $class;

        return $data;
    }
endif;



if (!function_exists('act_outs_excerpt_length')) :

    /**
     * Implement excerpt length.
     *
     * @since 1.0.0
     *
     * @param int $length The number of words.
     * @return int Excerpt length.
     */
    function act_outs_excerpt_length($length)
    {

        if (is_admin()) {
            return $length;
        }

        $excerpt_length = act_outs_get_option('excerpt_length');

        if (absint($excerpt_length) > 0) {
            $length = absint($excerpt_length);
        }

        return $length;
    }

endif;

add_filter('excerpt_length', 'act_outs_excerpt_length', 999);


if (!function_exists('act_outs_banner_header')) :
    /**
     * Page Header
     */
    function act_outs_banner_header()
    {

        if (is_front_page() && is_home()) {
            $header_image = get_header_image('page-image');
            $header_image_url = !empty($header_image) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_front_page()) {
            return;
        } else {
            $header_image_url = act_outs_banner_image($image_url = '');
        } ?>
        <div id="page-site-header" style="background-image: url('<?php echo esc_url($header_image_url); ?>');">
            <?php $header_title   = act_outs_get_option('disable_header_title');
            if (true == $header_title) : ?>
                <div class="overlay"></div>
                <header class='page-header'>
                    <div class="wrapper">
                        <?php act_outs_banner_title(); ?>
                    </div>
                </header>
            <?php endif; ?>

        </div><!-- #page-site-header -->
        <?php echo '<div class= "page-section">';
    }
endif;
add_action('act_outs_banner_header', 'act_outs_banner_header', 10);



if (!function_exists('act_outs_banner_title')) :
    /**
     * Page Header
     */
    function act_outs_banner_title()
    {
        if ((is_front_page() && is_home()) || is_home()) {
            $latest_posts_title = act_outs_get_option('latest_posts_title');
            echo '<h2 class="page-title">';
            echo esc_html($latest_posts_title);
            echo '</h2>';
        }

        if (is_singular()) {
            the_title('<h2 class="page-title">', '</h2>');
        }

        if (is_archive()) {
            the_archive_description('<div class="archive-description">', '</div>');
            the_archive_title('<h2 class="page-title">', '</h2>');
        }

        if (is_search()) { ?>
            <h2 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'act-outs'), '<span>' . get_search_query() . '</span>'); ?></h2>
        <?php }

        if (is_404()) {
            echo '<h2 class="page-title">' . esc_html__('Error 404', 'act-outs') . '</h2>';
        }
    }
endif;


if (!function_exists('act_outs_banner_image')) :
    /**
     * Banner Header Image
     */
    function act_outs_banner_image($image_url)
    {
        global $post;

        $archive_header = act_outs_get_option('archive_header_image');
        $search_header = act_outs_get_option('search_header_image');
        $header_404 = act_outs_get_option('404_header_image');
        $header_category = act_outs_get_option('category_header_image');
        $archive_header_event = act_outs_get_option('archive_event_header_image');
        $archive_header_firstgroup = act_outs_get_option('archive_firstgroup_header_image');
        $archive_header_secondgroup = act_outs_get_option('archive_secondgroup_header_image');
        $archive_header_thirdgroup = act_outs_get_option('archive_thirdgroup_header_image');
        $archive_header_fourthgroup = act_outs_get_option('archive_fourthgroup_header_image');
        if (is_home() && !is_front_page()) {
            $image_url      = get_the_post_thumbnail_url(get_option('page_for_posts'), 'full');
            $header_image = get_header_image();
            $fallback_image = !empty($header_image) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
            $image_url      = (!empty($image_url)) ? $image_url : $fallback_image;
        } elseif (is_singular()) {
            $image_url      = get_the_post_thumbnail_url($post->ID, 'full');
            $header_image = get_header_image();
            $fallback_image = !empty($header_image) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
            $image_url      = (!empty($image_url)) ? $image_url : $fallback_image;
        } elseif (is_search()) {
            $image_url = (!empty($search_header)) ? $search_header : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_404()) {
            $image_url = (!empty($header_404)) ? $header_404 : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_category()) {
            $image_url = (!empty($header_category)) ? $header_category : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_post_type_archive('event')) {
            $image_url = (!empty($archive_header_event)) ?     $archive_header_event : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_post_type_archive('firstgroup')) {
            $image_url = (!empty($archive_header_firstgroup)) ?     $archive_header_firstgroup : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_post_type_archive('secondgroup')) {
            $image_url = (!empty($archive_header_secondgroup)) ?  $archive_header_secondgroup : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_post_type_archive('thirdgroup')) {
            $image_url = (!empty($archive_header_thirdgroup)) ?  $archive_header_thirdgroup : get_template_directory_uri() . '/assets/images/default-header.jpg';
        } elseif (is_post_type_archive('fourthgroup')) {
            $image_url = (!empty($archive_header_fourthgroup)) ?  $archive_header_fourthgroup : get_template_directory_uri() . '/assets/images/default-header.jpg';
        }
        return $image_url;
    }
endif;

if (!function_exists('act_outs_posts_tags')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function act_outs_posts_tags()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type() && has_tag()) { ?>
            <div class="tags-links">

                <?php /* translators: used between list items, there is a space after the comma */
                $tags = get_the_tags();
                if ($tags) {

                    foreach ($tags as $tag) {
                        echo '<span><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></span>'; // wpcs: XSS OK.
                    }
                } ?>
            </div><!-- .tags-links -->
<?php }
    }
endif;

/**
 * Render social links.
 *
 * @since 1.0
 */
function act_outs_render_social_links()
{

    $social_link1 = act_outs_get_option('social_link_1');
    $social_link2 = act_outs_get_option('social_link_2');
    $social_link3 = act_outs_get_option('social_link_3');
    $social_link4 = act_outs_get_option('social_link_4');

    if (empty($social_link1) && empty($social_link2) && empty($social_link3)) {
        return;
    }

    echo '<div class="social-icons">';
    echo '<ul>';
    if (!empty($social_link1)) {
        echo '<li><a href="' . esc_url($social_link1) . '" target="_blank" title="' . esc_url($social_link1) . '" ></a></li>';
    }
    if (!empty($social_link2)) {
        echo '<li><a href="' . esc_url($social_link2) . '" target="_blank" title="' . esc_url($social_link2) . '"></a></li>';
    }
    if (!empty($social_link3)) {
        echo '<li><a href="' . esc_url($social_link3) . '" target="_blank" title="' . esc_url($social_link3) . '"></a></li>';
    }
    if (!empty($social_link4)) {
        echo '<li><a href="' . esc_url($social_link4) . '" target="_blank" title="' . esc_url($social_link4) . '"></a></li>';
    }
    echo '</ul>';
    echo '</div>';
}

if (!function_exists('act_outs_pagination')) :
    /**
     * blog/archive pagination.
     *
     * @return pagination type value
     */
    function act_outs_pagination()
    {
        $pagination = act_outs_get_option('pagination_type');
        if ($pagination == 'default') :
            the_posts_navigation();
        elseif ($pagination == 'numeric') :
            the_posts_pagination(array(
                'mid_size' => 4,
                'prev_text' => '<<',
                'next_text' => '>>',
            ));
        endif;
    }
endif;
add_action('act_outs_pagination_action', 'act_outs_pagination', 10);
