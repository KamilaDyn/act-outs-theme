<?php

/**
 * Home Page Options.
 *
 * @package act-outs
 */

$default = act_outs_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel(
    'home_page_panel',
    array(
        'title'      => __('Front Page Sections', 'act-outs'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
    )
);

/**
 * Section Customizer Options.
 */
require get_template_directory() . '/inc/customizer/sections/topgalleryslider.php';
require get_template_directory() . '/inc/customizer/sections/welcomevideo.php';
require get_template_directory() . '/inc/customizer/sections/courses.php';
require get_template_directory() . '/inc/customizer/sections/slider.php';
require get_template_directory() . '/inc/customizer/sections/blog.php';
require get_template_directory() . '/inc/customizer/sections/about.php';
require get_template_directory() . '/inc/customizer/sections/message.php';
require get_template_directory() . '/inc/customizer/sections/singleevent.php';
