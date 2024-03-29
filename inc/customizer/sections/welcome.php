<?php

/**
 * Welcome option
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Welcome  Section
$wp_customize->add_section(
    'section_welcome',
    array(
        'title'      => __('Welcome Section', 'act-outs'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_welcome_section]',
    array(
        'default'           => $default['disable_welcome_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);


$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_welcome_section]',
    array(
        'label'     => __('Disable welcome video Section', 'act-outs'),
        'section'                => 'section_welcome',
        'settings'          => 'theme_options[disable_welcome_section]',
        'on_off_label'         => act_outs_switch_options(),
    )
));

// Welcome Video Title
$wp_customize->add_setting(
    'theme_options[welcome_title]',
    array(
        'default'           => $default['welcome_title'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'theme_options[welcome_title]',
    array(
        'label'       => __('Section Title', 'act-outs'),
        'section'     => 'section_welcome',
        'active_callback' => 'act_outs_welcome_active',
        'type'        => 'text'
    )
);

// Choose page with video
$wp_customize->add_setting(
    'theme_options[welcome_page]',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_dropdown_pages'
    )
);

$wp_customize->add_control(
    'theme_options[welcome_page]',
    array(
        'label'       => __('Select Page for Welcome Section', 'act-outs'),
        'section'     => 'section_welcome',
        'settings' =>     'theme_options[welcome_page]',
        'type'        => 'dropdown-pages',
        'active_callback' => 'act_outs_welcome_active',
    )
);
