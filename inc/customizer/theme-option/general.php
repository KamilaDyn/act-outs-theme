<?php

/**
 * Theme Options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();
//For General Option
$wp_customize->add_section('section_general', array(
    'title'       => __('General Setting', 'act-outs'),
    'panel'       => 'theme_option_panel'
));

$wp_customize->add_setting(
    'theme_options[disable_homepage_content_section]',
    array(
        'default'           => $default['disable_homepage_content_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[`]',
    array(
        'label'             => __('Enable/Disable Static Homepage Content Section', 'act-outs'),
        'description' => __('This option is only work on Static HomePage ', 'act-outs'),
        'section'            => 'section_general',
        'settings'          => 'theme_options[disable_homepage_content_section]',
        'on_off_label'         => act_outs_switch_options(),
    )
));

//Layout Options for Blog
$wp_customize->add_setting(
    'theme_options[layout_options_blog]',
    array(
        'default'             => $default['layout_options_blog'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_select'
    )
);

$wp_customize->add_control(new Act_Outs_Image_Radio_Control(
    $wp_customize,
    'theme_options[layout_options_blog]',
    array(
        'label'     => __('Layout Option For Blog', 'act-outs'),
        'section'     => 'section_general',
        'settings'  => 'theme_options[layout_options_blog]',
        'type'         => 'radio-image',
        'choices'     => array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'no-sidebar'     => get_template_directory_uri() . '/assets/images/no-sidebar.png',
        ),
    )
));

//Layout Options for Archive
$wp_customize->add_setting(
    'theme_options[layout_options_archive]',
    array(
        'default'             => $default['layout_options_archive'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_select'
    )
);

$wp_customize->add_control(new Act_Outs_Image_Radio_Control(
    $wp_customize,
    'theme_options[layout_options_archive]',
    array(
        'label'     => __('Layout Option For Archive', 'act-outs'),
        'section'     => 'section_general',
        'settings'  => 'theme_options[layout_options_archive]',
        'type'         => 'radio-image',
        'choices'     => array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'no-sidebar'     => get_template_directory_uri() . '/assets/images/no-sidebar.png',
        ),
    )
));


//Layout Options for Pages
$wp_customize->add_setting(
    'theme_options[layout_options_page]',
    array(
        'default'             => $default['layout_options_page'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_select'
    )
);

$wp_customize->add_control(new Act_Outs_Image_Radio_Control(
    $wp_customize,
    'theme_options[layout_options_page]',
    array(
        'label'     => __('Layout Option For Pages', 'act-outs'),
        'section'     => 'section_general',
        'settings'  => 'theme_options[layout_options_page]',
        'type'         => 'radio-image',
        'choices'     => array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'no-sidebar'     => get_template_directory_uri() . '/assets/images/no-sidebar.png',
        ),
    )
));

//Layout Options for Single Post
$wp_customize->add_setting(
    'theme_options[layout_options_single]',
    array(
        'default'             => $default['layout_options_single'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_select'
    )
);

$wp_customize->add_control(new Act_Outs_Image_Radio_Control(
    $wp_customize,
    'theme_options[layout_options_single]',
    array(
        'label'     => __('Layout Option For Single Posts', 'act-outs'),
        'section'     => 'section_general',
        'settings'  => 'theme_options[layout_options_single]',
        'type'         => 'radio-image',
        'choices'     => array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'no-sidebar'     => get_template_directory_uri() . '/assets/images/no-sidebar.png',
        ),
    )
));

// Setting excerpt_length.
$wp_customize->add_setting('theme_options[excerpt_length]', array(
    'default'           => $default['excerpt_length'],
    'sanitize_callback' => 'act_outs_sanitize_positive_integer',
));
$wp_customize->add_control('theme_options[excerpt_length]', array(
    'label'       => esc_html__('Excerpt Length', 'act-outs'),
    'description' => esc_html__('in words', 'act-outs'),
    'section'     => 'section_general',
    'type'        => 'number',
    'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 55px;'),
));
