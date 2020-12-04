<?php

/**
 * act-outs Theme Customizer
 *
 * @package act-outs
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function act_outs_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';


	// Add Panel.
	$wp_customize->add_panel(
		'theme_option_panel',
		array(
			'title'      => __('Theme Options', 'act-outs'),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';


	// Load customize options.
	include get_template_directory() . '/inc/customizer/options.php';

	// Load customize control.
	include get_template_directory() . '/inc/customizer/control.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/footer.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/general.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/header-image.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/latest.php';

	// Load top bar section option.
	include get_template_directory() . '/inc/customizer/theme-option/topbar.php';


	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
}
add_action('customize_register', 'act_outs_customize_register');




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function act_outs_customize_preview_js()
{
	wp_enqueue_script('act-outs-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'act_outs_customize_preview_js');


function act_outs_customize_backend_scripts()
{

	wp_enqueue_style('act-outs-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css');
	wp_enqueue_script('act-outs-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array('jquery', 'customize-controls'), '1.0.0', true);
}
add_action('customize_controls_enqueue_scripts', 'act_outs_customize_backend_scripts', 10);
