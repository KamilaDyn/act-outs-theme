<?php

/** Header Settings */
$wp_customize->add_section(
    'topbar_section',
    array(
        'title' => __('Top Bar Settings', 'act-outs'),
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'panel'       => 'theme_option_panel'
    )
);

$wp_customize->add_setting(
    'theme_options[disable_show_header_contact_info]',
    array(
        'default'           => $default['disable_show_header_contact_info'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);

$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable__header_contact_info]',
    array(
        'label'             => __('Enable/Disable Contact Section', 'act-outs'),
        'section'            => 'topbar_section',
        'settings'          => 'theme_options[disable_show_header_contact_info]',
        'on_off_label'         => act_outs_switch_options(),
    )
));

/** Phone Number  */
$wp_customize->add_setting(
    'theme_options[ header_phone]',
    array(
        'default' => '',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'theme_options[ header_phone]',
    array(
        'label' => __('Phone Number', 'act-outs'),
        'section' => 'topbar_section',
        'type' => 'text',
        'active_callback' => 'act_outs_contact_info_ac'
    )
);

/** Email Address  */
$wp_customize->add_setting(
    'theme_options[ header_email]',
    array(
        'default' => '',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    'theme_options[ header_email]',
    array(
        'label' => __('Email address', 'act-outs'),
        'section' => 'topbar_section',
        'type' => 'text',
        'active_callback' => 'act_outs_contact_info_ac',
    )
);
