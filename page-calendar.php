<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */

get_header(); ?>
<div class="wrapper page-section page-calendar">
	<div id="primary" class="content-area" style="width: 100%;">
		<main id="main" class="site-main " role="main">

			<?php


			$img_class = '';
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(' ' . $img_class); ?>>
				<div class="colors-container">
					<ul>
						<li><span class="color"></span>Term Dates</li>
						<li><span class="color"></span>Bank Holidays</li>

					</ul>
				</div>
				<div id="calendar"></div>
			</div><!-- #post-## -->




		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
