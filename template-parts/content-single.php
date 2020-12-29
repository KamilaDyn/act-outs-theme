<?php
/*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package act-outs
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-item">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-meta">
            <?php act_outs_posted_on();
            ?>
        </div><!-- .entry-meta -->

        <div class="entry-content">
            <?php the_content();

            if (get_field('zoom_link')) {
            ?>
                <div class="zoom-link">
                    <h3> <a href="<?php echo get_field('zoom_link'); ?>">
                            <?php echo get_field('display_text') ?>
                        </a></h3>
                </div>
            <?php   } ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'act-outs'),
                'after'  => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
        <?php act_outs_entry_meta();
        act_outs_posts_tags(); ?>
        <?php if (get_edit_post_link()) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__('Edit %s', 'act-outs'),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </div>
</article><!-- #post-## -->