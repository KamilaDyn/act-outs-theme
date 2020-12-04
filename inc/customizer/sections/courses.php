<?php

/**
 * Features options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Features Section
$wp_customize->add_section(
    'section_home_courses',
    array(
        'title'      => __('Course  Posts ', 'act-outs'),
        'priority'   => 20,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);

$wp_customize->add_setting(
    'theme_options[disable_courses_section]',
    array(
        'default'           => $default['disable_courses_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_courses_section]',
    array(
        'label'             => __('Enable/Disable Course Section', 'act-outs'),
        'section'            => 'section_home_courses',
        'settings'          => 'theme_options[disable_courses_section]',
        'on_off_label'         => act_outs_switch_options(),
    )
));

//Features Section title
$wp_customize->add_setting(
    'theme_options[course_title]',
    array(
        'default'           => $default['course_title'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'theme_options[course_title]',
    array(
        'label'       => __('Section Title', 'act-outs'),
        'section'     => 'section_home_courses',
        'settings'    => 'theme_options[course_title]',
        'active_callback' => 'act_outs_courses_active',
        'type'        => 'text'
    )
);

for ($i = 1; $i <= 4; $i++) {


    // Additional Information First Page
    $wp_customize->add_setting(
        'theme_options[course_page_' . $i . ']',
        array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'act_outs_dropdown_pages'
        )
    );

    $wp_customize->add_control(
        'theme_options[course_page_' . $i . ']',
        array(
            'label'       => sprintf(__('Select Page #%1$s', 'act-outs'), $i),
            'section'     => 'section_home_courses',
            'settings'    => 'theme_options[course_page_' . $i . ']',
            'type'        => 'dropdown-pages',
            'active_callback' => 'act_outs_courses_active',
        )
    );
}
