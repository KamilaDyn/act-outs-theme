<?php

/**
 * Author options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Author Section
$wp_customize->add_section(
    'section_home_single_event',
    array(
        'title'      => __('Single Event Counter Section', 'act-outs'),
        'priority'   => 30,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_single-event_section]',
    array(
        'default'           => $default['disable_single-event_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_single-event_section]',
    array(
        'label'             => __('Enable/Disable Single Event Section', 'act-outs'),
        'section'            => 'section_home_single_event',
        'settings'          => 'theme_options[disable_single-event_section]',
        'on_off_label'         => act_outs_switch_options(),
    )
));


// Additional Information First Post
$wp_customize->add_setting(
    'theme_options[singleevent_post]',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_dropdown_posts'
    )
);

$wp_customize->add_control(new Act_Outs_Dropdown_Chooser(
    $wp_customize,
    'theme_options[singleevent_post]',
    array(
        'label'       => __('Select Event Act Outs', 'act-outs'),
        'section'     => 'section_home_single_event',
        'settings'    => 'theme_options[singleevent_post]',
        'choices'            => act_outs_event_post_choices(),
        'type'        => 'dropdown-posts',
        'active_callback' => 'act_outs_single_event_active',
    )
));

$wp_customize->add_setting(
    'theme_options[disable_single-event_counter]',
    array(
        'default'           => $default['disable_single-event_counter'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_single-event_counter]',
    array(
        'label'             => __('Enable/Disable Single Event Counter', 'act-outs'),
        'description' => __('Enable count time until events', 'act-outs'),
        'section'            => 'section_home_single_event',
        'settings'          => 'theme_options[disable_single-event_counter]',
        'on_off_label'         => act_outs_switch_options(),
    )
));

// message title setting and control 
$wp_customize->add_setting('theme_options[singleevent_date]', array(
    'sanitize_callback' => 'esc_attr',
));

$wp_customize->add_control('theme_options[singleevent_date]', array(
    'label'               =>  __('Event Date ', 'act-outs'),
    'section'            => 'section_home_single_event',
    'active_callback'     => 'act_outs_single_event_active',
    'type'                    => 'date',
    'input_attrs' => array(
        'id' => 'datepicker',
        'placeholder' => __('mm-dd-yyyy', 'act-outs'),
    )
));
// message title setting and control 
$wp_customize->add_setting('theme_options[singleevent_address]', array(
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('theme_options[singleevent_address]', array(
    'label'               =>  __('Event Address ', 'act-outs'),
    'section'            => 'section_home_single_event',
    'active_callback'     => 'act_outs_single_event_active',
    'type'                => 'text',
));

// message title setting and control 
$wp_customize->add_setting('theme_options[singleevent_time]', array(
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('theme_options[singleevent_time]', array(
    'label'               =>  __('Event Time ', 'act-outs'),
    'section'            => 'section_home_single_event',
    'active_callback'     => 'act_outs_single_event_active',
    'type'                => 'text',
));

// message title setting and control 
$wp_customize->add_setting('theme_options[singleevent_btn_text]', array(
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('theme_options[singleevent_btn_text]', array(
    'label'               =>  __('Button Text ', 'act-outs'),
    'section'            => 'section_home_single_event',
    'active_callback'     => 'act_outs_single_event_active',
    'type'                => 'text',
));
