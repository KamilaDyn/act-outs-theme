<?php

/**
 * act-outs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package act-outs
 */
require get_theme_file_path('/inc/widgets.php');
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('act_outs_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function act_outs_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on act-outs, use a find and replace
		 * to change 'act-outs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('act-outs', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('act-outs-blog', 360, 270, true);
		add_image_size('video-poster', 520, 350, true);
		add_image_size('video-poster-welcome', 950, 450, true);
		add_image_size('page-image', 1060, 470, true);
		add_image_size('single-page-image', 860, 350, true);
		add_image_size('vertical-large', 1280, 450, true);
		add_image_size('widget-event-small', 300, 200, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'act-outs'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'act_outs_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 45,
				'width'       => 45,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'act_outs_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function act_outs_content_width()
{
	$GLOBALS['content_width'] = apply_filters('act_outs_content_width', 640);
}
add_action('after_setup_theme', 'act_outs_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function act_outs_widgets_init()

{
	register_widget('events_widget');
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Event', 'act-outs'),
		'id'            => 'sidebar-events',
		'description'   => esc_html__('Sidebar for events side, add widget here'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'act-outs'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'act-outs'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => sprintf(esc_html__('Footer %d', 'act-outs'), 1),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => sprintf(esc_html__('Footer %d', 'act-outs'), 2),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => sprintf(esc_html__('Footer %d', 'act-outs'), 3),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => sprintf(esc_html__('Footer %d', 'act-outs'), 4),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'act_outs_widgets_init');

/**
 * Remove archive title:, 
 */
add_filter('get_the_archive_title', function ($title) {
	if (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});


/**
 * Register custom fonts.
 */
function act_outs_fonts_url()
{
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by |Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ('off' !== _x('on', 'Playfair Display font: on or off', 'act-outs')) {
		$fonts[] = 'Playfair Display';
	}
	/* translators: If there are characters in your language that are not supported by Muli, translate this to 'off'. Do not translate into your own language. */
	if ('off' !== _x('on', 'Muli font: on or off', 'act-outs')) {
		$fonts[] = 'Muli';
	}


	/* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
	if ('off' !== _x('on', 'Oxygen font: on or off', 'act-outs')) {
		$fonts[] = 'Oxygen';
	}

	if ($fonts) {
		$fonts_url = add_query_arg(array(
			'family' => urlencode(implode('|', $fonts)),
			'subset' => urlencode($subsets),
		), 'https://fonts.googleapis.com/css');
	}

	return esc_url_raw($fonts_url);
}


/**
 * Enqueue scripts and styles.
 */
function act_outs_scripts()
{
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	$fonts_url = act_outs_fonts_url();
	$primary_color = act_outs_get_option('primary_color');

	wp_enqueue_style('act-outs-google-fonts', $fonts_url, array(), null);


	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', '', '4.7.0');

	wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme' . $min . '.css', '', 'v2.2.0');

	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick' . $min . '.css', '', 'v1.8.0');

	wp_enqueue_style('act-outs-blocks', get_template_directory_uri() . '/assets/css/blocks' . $min . '.css');

	wp_enqueue_style('act-outs-style', get_stylesheet_uri());

	wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array('jquery'), '2017417', true);

	wp_enqueue_script('jquery-match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight' . $min . '.js', array('jquery'), '2017417', true);

	wp_enqueue_script('imagesloaded');


	wp_enqueue_script('act-outs-navigation', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), '20151215', true);
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array(), '1.0.0', true);

	wp_enqueue_script('act-outs-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true);
	$enable_counter = act_outs_get_option('disable_singleevent_counter');
	$singleevent_date = act_outs_get_option('singleevent_date');
	if (($enable_counter == true) && !empty($singleevent_date) && is_front_page()) :
		// count down js
		wp_enqueue_script('act-outs-countdown', get_template_directory_uri() . '/assets/js/countdown' . $min . '.js', array('jquery'), '', true);
	endif;

	wp_enqueue_script('act-outs-custom-js', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array('jquery'), '20151215', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'act_outs_scripts');



/* customize login page */
function ourheaderurl()
{
	return esc_url(site_url('/'));
}
add_filter('login_headerurl', 'ourheaderurl');

/*change login style */
function my_login_CSS()
{
	wp_enqueue_style('custom-login',  get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('act-outs-google-fonts', $fonts_url, array(), null);
}
add_action('login_enqueue_scripts', 'my_login_CSS');


/*change login headline title */

function ourLoginTitle()
{
	return get_bloginfo('name');
}
add_filter('login_headertext', 'ourLoginTitle');

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';
