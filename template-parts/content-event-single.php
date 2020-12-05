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
$content = apply_filters('the_content', get_the_content());
$video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
$img_class = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($img_class); ?>>

    <div class="post-item">
        <?php if (has_post_thumbnail()) { ?>
            <figure><?php the_post_thumbnail('single-page-image'); ?>

            </figure>

        <?php } ?>


        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-meta event-date">
            <h3><?php
                $eventDate = new DateTime(get_field('event_date'));
                echo __($eventDate->format('d.m.Y')); ?></h3>
        </div><!-- .entry-meta -->
        <div class="entry-container">

            <div class="entry-content">
                <?php the_content() ?>
            </div><!-- .entry-content -->

            <div class="entry-meta">

            </div><!-- .entry-meta -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->