<?php

/**
 * Welcome video option
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Welcome Video Section
$wp_customize->add_section(
    'section_welcome_video',
    array(
        'title'      => __('Welcome video Section', 'act-outs'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_welcome-video_section]',
    array(
        'default'           => $default['disable_welcome-video_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);


$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_welcome-video_section]',
    array(
        'label'     => __('Disable welcome video Section', 'act-outs'),
        'section'                => 'section_welcome_video',
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
        'section'     => 'section_welcome_video',
        'active_callback' => 'act_outs_welcome_video_active',
        'type'        => 'text'
    )
);

// Choose post with video
$wp_customize->add_setting(
    'theme_options[welcome_video]',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_dropdown_posts'
    )
);

$wp_customize->add_control(new Act_Outs_Dropdown_Chooser(
    $wp_customize,
    'theme_options[welcome_video]',
    array(
        'label'       => __('Select Post for Video', 'act-outs'),
        'section'     => 'section_welcome_video',
        'choices'      => act_outs_post_choices(),
        'type'        => 'dropdown-posts',
        'active_callback' => 'act_outs_welcome_video_active',
    )
));
