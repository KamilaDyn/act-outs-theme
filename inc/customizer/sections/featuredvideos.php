<?php

/**
 * Home Page Options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section(
    'section_featured_videos',
    array(
        'title'      => __('Featured Videos Section', 'act-outs'),
        'priority'   => 30,
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
    )
);


$wp_customize->add_setting(
    'theme_options[disable_featured-videos_section]',
    array(
        'default'           => $default['disable_featured-videos_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'act_outs_sanitize_switch_control',
    )
);
$wp_customize->add_control(new Act_Outs_Switch_Control(
    $wp_customize,
    'theme_options[disable_featured-videos_section]',
    array(
        'label'     => __('Enable/Disable Featured Videos Section', 'act-outs'),
        'section'                => 'section_featured_videos',
        'on_off_label'         => act_outs_switch_options(),
    )
));


// Blog title
$wp_customize->add_setting(
    'theme_options[featured_vidoes_title]',
    array(
        'default'           => $default['featured_videos_title'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'theme_options[featured_vidoes_title]',
    array(
        'label'       => __('Section Title', 'act-outs'),
        'section'     => 'section_featured_videos',
        'settings'    => 'theme_options[featured_vidoes_title]',
        'active_callback' => 'act_outs_featured_vidoes_active',
        'type'        => 'text'
    )
);




for ($i = 1; $i <= 2; $i++) {


    // Additional Information First Title
    $wp_customize->add_setting(
        'theme_options[video_title_' . $i . ']',
        array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'theme_options[video_title_' . $i . ']',
        array(
            'label'       => sprintf(__('Title Video Post #%1$s', 'act-outs'), $i),
            'section'     => 'section_featured_videos',
            'settings'    => 'theme_options[video_title_' . $i . ']',
            'type'        => 'text',
            'active_callback' =>  'act_outs_featured_vidoes_active',
        )
    );




    // Additional Information First Post
    $wp_customize->add_setting(
        'theme_options[featured_video_post_' . $i . ']',
        array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'act_outs_dropdown_posts'
        )
    );
    $wp_customize->add_control(new Act_Outs_Dropdown_Chooser(
        $wp_customize,
        'theme_options[featured_video_post_' . $i . ']',
        array(
            'label'       => sprintf(__('Select Post #%1$s', 'act-outs'), $i),
            'section'     => 'section_featured_videos',
            'settings'    => 'theme_options[featured_video_post_' . $i . ']',
            'choices'            => act_outs_featured_videos_post_choices(),
            'type'        => 'dropdown-posts',
            'active_callback' => 'act_outs_featured_vidoes_active',
        )
    ));
}
