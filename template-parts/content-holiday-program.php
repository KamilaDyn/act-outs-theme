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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-item">
        <?php
        $eventDate = new DateTime(get_field('event_start'));
        if (get_field('event_start')) : ?>
            <div class="entry-meta posted-on">
                <h3><?php
                    $eventDate = new DateTime(get_field('event_start'));
                    $eventEnd = new DateTime(get_field('event_end'));
                    echo __($eventDate->format('d.m.Y')); ?>
                    <?php if ($eventEnd > $eventDate) : echo  ' - ' . __($eventEnd->format('d.m.Y'));
                    endif; ?>

                </h3>
            </div><!-- .entry-meta -->
        <?php endif; ?>
        <div class="entry-container">
            <header class="entry-header">
                <h2><?php the_title() ?></h2>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content() ?>
            </div><!-- .entry-content -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->