<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */
?>
<?php

$img_class = '';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(' ' . $img_class); ?>>
    <div id="calendar" data-provide="calendar"></div>
</div><!-- #post-## -->