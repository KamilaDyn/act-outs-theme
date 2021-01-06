<?php

/**
 * Home Page Options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section(
    'section_home_blog',
    array(
        'title'      => __('Last Post in Blog Section', 'act-outs'),
        'priority'   => 30,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);


$wp_customize->add_setting(
    'theme_options[disable_blog_section]',
    array(
        'default'           => $default['disable_blog_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_blog_section]',
    array(
        'label'     => __('Enable/Disable Blog Post Section', 'act-outs'),
        'section'                => 'section_home_blog',
        'on_off_label'         => act_outs_switch_options(),
    )
));


// Blog title
$wp_customize->add_setting(
    'theme_options[blog_title]',
    array(
        'default'           => $default['blog_title'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'theme_options[blog_title]',
    array(
        'label'       => __('Section Title', 'act-outs'),
        'section'     => 'section_home_blog',
        'settings'    => 'theme_options[blog_title]',
        'active_callback' => 'act_outs_blog_active',
        'type'        => 'text'
    )
);




for ($i = 1; $i <= 3; $i++) {

    // Additional Information First Post
    $wp_customize->add_setting(
        'theme_options[blog_post_' . $i . ']',
        array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'act_outs_dropdown_posts'
        )
    );
    $wp_customize->add_control(new Act_Outs_Dropdown_Chooser(
        $wp_customize,
        'theme_options[blog_post_' . $i . ']',
        array(
            'label'       => sprintf(__('Select Post #%1$s', 'act-outs'), $i),
            'section'     => 'section_home_blog',
            'settings'    => 'theme_options[blog_post_' . $i . ']',
            'choices'            => act_outs_post_choices(),
            'type'        => 'dropdown-posts',
            'active_callback' => 'act_outs_blog_active',
        )
    ));
}
