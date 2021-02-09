<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EventBellChild
 */
?>
<?php
$img_class = '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group ' . $img_class); ?>>

    <div class="post-item">

        <div class="entry-container">
            <header class="entry-header">
                <h2 class="entry-title"><?php the_title(); ?></h2>
            </header><!-- .entry-header -->
            <?php the_content(); ?>

        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->