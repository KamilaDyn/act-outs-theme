<?php

/**
 * Slider options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section(
    'section_gallery_slider',
    array(
        'title'      => __('Gallery Slider Section', 'act-outs'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_gallery-slider_section]',
    array(
        'default'           => $default['disable_gallery-slider_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_gallery-slider_section]',
    array(
        'label'     => __('Disable slider Section', 'act-outs'),
        'section'                => 'section_gallery_slider',
        'on_off_label'         => act_outs_switch_options(),
    )
));


$wp_customize->add_setting(
    'theme_options[disable_gallery-white_overlay]',
    array(
        'default'           => $default['disable_white_overlay'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_gallery-white_overlay]',
    array(
        'label'     => __('Disable White overlay and enable image overlay', 'act-outs'),
        'section'                => 'section_gallery_slider',
        'on_off_label'         => act_outs_switch_options(),
        'active_callback' => 'act_outs_gallery_slider_active',
    )
));



// Setting  Slider Category.
$wp_customize->add_setting(
    'theme_options[slider_gallery_category]',
    array(

        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    new act_outs_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[slider_gallery_category]',
        array(
            'label'    => __('Select Category Slider', 'act-outs'),
            'section'                => 'section_gallery_slider',
            'settings' => 'theme_options[slider_gallery_category]',
            'active_callback' => 'act_outs_gallery_slider_active',
        )
    )
);
