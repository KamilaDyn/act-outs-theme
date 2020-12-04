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
if (has_post_thumbnail()) {
    $img_class = 'has-post-thumbnail';
} else {
    $img_class = 'no-post-thumbnail';
}

//Get the content, apply filters and execute shortcodes;
// $content = apply_filters('the_content', get_the_content());


//$embeds is an array and each item is the HTML of an embedded media.
//The first item of the array is the first embedded media in the content
$content = apply_filters('the_content', get_the_content());
$video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item ' . $img_class); ?>>
    <div class="post-item">

        <?php if (has_post_thumbnail()) { ?>
            <figure>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

            </figure>

        <?php } else if ($video) { ?>

            <figure><?php echo $video[0] ?></figure>


        <?php   } ?>

        <div class="entry-meta posted-on">
            <?php act_outs_posted_on(); ?>
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
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
            <div class="entry-meta">
                <?php act_outs_entry_meta(); ?>
            </div><!-- .entry-meta -->


        </div><!-- .entry-container -->
    </div><!-- .post-item -->
</article><!-- #post-## -->