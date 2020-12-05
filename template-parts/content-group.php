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
if (has_post_thumbnail()) {
    $img_class = 'has-post-thumbnail';
} else {
    $img_class = 'no-post-thumbnail';
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item group ' . $img_class); ?>>

    <div class="post-item">
        <?php if (has_post_thumbnail()) { ?>
            <figure>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

            </figure>

        <?php } ?>

        <?php if (!has_post_thumbnail() && $video) { ?>
            <figure>
                <?php echo $video[0]; ?>
            </figure>
        <?php  } ?>

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
                <?php the_excerpt(); ?>
                <a class="btn" href="<?php the_permalink(); ?>">Go to lesson</a>
            </div><!-- .entry-content -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->