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
            <figure><?php the_post_thumbnail('vertical-large'); ?>
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

        <div class="entry-container">

            <div class="entry-content">
                <?php $content = strip_shortcodes(get_the_content());
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                echo $content; ?>
            </div><!-- .entry-content -->
            <?php if ($video) { ?>
                <h3 class="video-title">Videos Section for lesson</h3>

                <div class="videos-container">

                    <?php
                    foreach ($video as $singleVideo) { ?>
                        <figure class="video">
                            <?php echo $singleVideo;
                            ?>
                        </figure>
                    <?php } ?>

                </div>
            <?php } ?>



        </div><!-- .entry-container -->
    </div><!-- .post-item -->

</article><!-- #post-## -->