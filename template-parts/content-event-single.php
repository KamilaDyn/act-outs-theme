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

<article id="post-<?php the_ID(); ?>" <?php post_class($img_class); ?>>

    <div class="post-item">
        <?php if (has_post_thumbnail()) { ?>
            <figure><?php the_post_thumbnail('full'); ?>

            </figure>

        <?php } ?>

        <header class="entry-header">

            <?php
            if (is_single()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif; ?>


        </header><!-- .entry-header -->
        <div class="entry-meta event-date">
            <h3><?php
                $eventDate = new DateTime(get_field('event_date'));
                echo __($eventDate->format('d.m.Y')); ?></h3>
        </div><!-- .entry-meta -->
        <div class="entry-container">

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
            <div class="entry-meta">

            </div><!-- .entry-meta -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->