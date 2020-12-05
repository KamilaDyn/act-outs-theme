<?php

/**
 * Default theme options.
 *
 * @package act-outs
 */

if (!function_exists('act_outs_get_default_theme_options')) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function act_outs_get_default_theme_options()
    {

        $theme_data = wp_get_theme();
        $defaults = array();

        $defaults['disable_homepage_content_section'] = true;

        //Welcome Video Section
        $default['disable_welcome-video_section'] = true;

        // Featured Slider Section
        $defaults['disable_featured-slider_section']    = false;
        $defaults['disable_white_overlay']                = true;

        $default['disable_courses_section'] = false;

        // Top Bar Section 
        $defaults['disable_show_header_contact_info']    = false;

        // Featured Slider Section
        $defaults['disable_gallery-slider_section']    = false;
        $defaults['disable_gallery-white_overlay']                = true;


        // Act-Outs goal Section
        $defaults['disable_act_outs_section']            = false;
        $defaults['act_outs_title']                        = esc_html__('Act-Outs Goals', 'act-outs');


        // Popular Section
        $defaults['disable_popular_section']            = false;
        $defaults['popular_title']                            = esc_html__('Act Outs News And Blogs', 'act-outs');


        // Author Section
        $defaults['disable_message_section']            = false;

        //Cta Section	
        $defaults['disable_cta_section']                   = false;
        $defaults['cta_button_label']                        = esc_html__('Buy Your Ticket', 'act-outs');


        // Latest Posts Section
        $defaults['latest_posts_title']                        = esc_html__('Latest Posts', 'act-outs');
        $defaults['number_of_latest_posts_column']        = 3;
        $defaults['pagination_type']                    = 'default';

        // About Section
        $defaults['disable_about_section']                = false;
        $defaults['about_title']                            = esc_html__('Successfull Act Outs', 'act-outs');


        // Blog Section
        $defaults['disable_blog_section']                = false;
        $defaults['blog_title']                                = esc_html__('Upcoming Act Outs', 'act-outs');

        //General Section
        $defaults['excerpt_length']                        = 20;
        $defaults['layout_options_blog']                = 'no-sidebar';
        $defaults['layout_options_archive']                = 'right-sidebar';
        $defaults['layout_options_page']                = 'right-sidebar';
        $defaults['layout_options_single']                = 'right-sidebar';

        //Footer section 		
        $defaults['copyright_text']                        = esc_html__('Copyright &copy; All rights reserved.', 'act-outs');

        // Pass through filter.
        $defaults = apply_filters('act_outs_filter_default_theme_options', $defaults);
        return $defaults;
    }

endif;

/**
 *  Get theme options
 */
if (!function_exists('act_outs_get_option')) :

    /**
     * Get theme option
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function act_outs_get_option($key)
    {

        $default_options = act_outs_get_default_theme_options();
        if (empty($key)) {
            return;
        }

        $theme_options = (array)get_theme_mod('theme_options');
        $theme_options = wp_parse_args($theme_options, $default_options);

        $value = null;

        if (isset($theme_options[$key])) {
            $value = $theme_options[$key];
        }

        return $value;
    }

endif;
