<?php

/**
 * Theme Options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

/** Header Image Settings */
$wp_customize->add_section(
    'custom_header_image_settings',
    array(
        'capability'  => 'edit_theme_options',
        'title'       => esc_html__('Header Image For Inner Pages', 'act-outs'),
        'panel'       => 'theme_option_panel',
    )
);

/** Header Image */
$wp_customize->add_setting(
    'theme_options[archive_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'act_outs_sanitize_image',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[archive_header_image]',
        array(
            'label'         => esc_html__('Header Image For Archive Page', 'act-outs'),
            'description'   => esc_html__('Choose Header Image of your choice for Archive Pages. Recommended size for this image is 1920px by 500px.', 'act-outs'),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);


/** Header Archive Image */
$wp_customize->add_setting(
    'theme_options[archive_event_header_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'act_outs_sanitize_image',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[archive_event_header_image]',
        array(
            'label'         => esc_html__('Header Image For Archive Event Page', 'act-outs'),
            'description'   => esc_html__('Choose Header Image of your choice for Archive Pages. Recommended size for this image is 1920px by 500px.', 'act-outs'),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);

/** Search Header Image */
$wp_customize->add_setting(
    'theme_options[search_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'act_outs_sanitize_image',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[search_header_image]',
        array(
            'label'         => esc_html__('Header Image For Search Page', 'act-outs'),
            'description'   => esc_html__('Choose Header Image of your choice for Search Page. Recommended size for this image is 1920px by 500px', 'act-outs'),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);

/** 404 Header Image */
$wp_customize->add_setting(
    'theme_options[404_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'act_outs_sanitize_image',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'theme_options[404_header_image]',
        array(
            'label'         => esc_html__('Header Image For 404 Page', 'act-outs'),
            'description'   => esc_html__('Choose Header Image of your choice for 404 Page. Recommended size for this image is 1920px by 500px', 'act-outs'),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);
