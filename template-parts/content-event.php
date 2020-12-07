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
if (has_post_thumbnail()) {
    $img_class = 'has-post-thumbnail';
} else {
    $img_class = 'no-post-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item ' . $img_class); ?>>

    <div class="post-item">
        <?php if (has_post_thumbnail()) { ?>
            <figure>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('act-outs-blog'); ?></a>

            </figure>

        <?php } ?>
        <div class="entry-meta posted-on">
            <h3><?php
                $eventDate = new DateTime(get_field('event_date'));
                echo __($eventDate->format('d.m.Y')); ?></h3>
        </div><!-- .entry-meta -->
        <div class="entry-container">
            <header class="entry-header">

                <?php
                if (is_single()) :
                    the_title('<h1 class="entry-title">', '</h1>');
                else :
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif; ?>


            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php $content = strip_shortcodes(wp_trim_words(get_the_content(), 30));
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                echo $content; ?>
                <a class="btn" href="<?php the_permalink(); ?>">Read more</a>
            </div><!-- .entry-content -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->