<?php

/**
 * Slider options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section(
    'section_featured_slider',
    array(
        'title'      => __('Holiday Programs Section', 'act-outs'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_featured-slider_section]',
    array(
        'default'           => $default['disable_featured-slider_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_featured-slider_section]',
    array(
        'label'     => __('Disable slider Section', 'act-outs'),
        'section'                => 'section_featured_slider',
        'on_off_label'         => act_outs_switch_options(),
    )
));



// Setting  Slider Category.
$wp_customize->add_setting(
    'theme_options[slider_category]',
    array(

        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    new act_outs_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[slider_category]',
        array(
            'label'    => __('Select Category', 'act-outs'),
            'section'  => 'section_featured_slider',
            'settings' => 'theme_options[slider_category]',
            'active_callback' => 'act_outs_slider_active',
        )
    )
);

//Features Section title
$wp_customize->add_setting(
    'theme_options[slider_title]',
    array(
        'default'           => '',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'theme_options[slider_title]',
    array(
        'label'       => __('Section Title', 'act-outs'),
        'section'     =>   'section_featured_slider',
        'settings'    => 'theme_options[slider_title]',
        'active_callback' => 'act_outs_slider_active',
        'type'        => 'text'
    )
);
