<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package act-outs
 */
/**
 * Hook - act_outs_action_doctype.
 *
 * @hooked  act_outs_doctype -  10
 */
do_action('act_outs_action_doctype');
?>

<head>
	<?php
	/**
	 * Hook - act_outs_action_head.
	 *
	 * @hooked  act_outs_head -  10
	 */
	do_action('act_outs_action_head');
	?>

	<?php wp_head(); ?>
</head>

<body id="bodypage" <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>
	<?php

	/**
	 * Hook -  act_outs_action_before.
	 *
	 * @hooked  act_outs_page_start - 10
	 */
	do_action('act_outs_action_before');

	/**
	 *
	 * @hooked  act_outs_header_start - 10
	 
	 */
	do_action('act_outs_action_before_header');

	/**
	 *@hooked  act_outs_header_top - 10
	 *@hooked  act_outs_site_branding - 15
	 *@hooked  act_outs_header_end - 20
	 */
	do_action('act_outs_action_header');

	/**
	 *
	 * @hooked  act_outs_content_start - 10
	 */
	do_action('act_outs_action_before_content');

	/**
	 * Banner start
	 * 
	 * @hooked  act_outs_banner_header - 10
	 */
	if (!is_single()) {
		do_action('act_outs_banner_header');
	}
