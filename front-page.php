<?php

/**
 * The template for displaying home page.
 * @package act-outs
 */
$disable_homepage_content_section = act_outs_get_option('disable_homepage_content_section');
if ('posts' != get_option('show_on_front')) {
    get_header(); ?>
    <?php $enabled_sections = act_outs_get_sections();
    if (is_array($enabled_sections)) {
        foreach ($enabled_sections as $section) {
            if (($section['id'] == 'welcome')) { ?>
                <?php $disable_welcome = act_outs_get_option('disable_welcome_section');
                if (true == $disable_welcome) : ?>

                    <section id="<?php echo esc_attr($section['id']); ?>">

                        <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                    </section>
                <?php endif; ?>


            <?php } elseif ($section['id'] == 'gallery-slider') { ?>
                <?php $disable_gallery_section = act_outs_get_option('disable_gallery-slider_section');
                if (true == $disable_gallery_section) : ?>

                    <section id="<?php echo esc_attr($section['id']); ?>">

                        <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>

                    </section>

                <?php endif; ?>

            <?php } elseif ($section['id'] == 'blog') { ?>
                <?php $disable_blog_section = act_outs_get_option('disable_blog_section');
                if (true === $disable_blog_section) :
                    $background_blog_section = act_outs_get_option('background_blog_section'); ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class=" page-section" style="background-image: url('<?php echo esc_url($background_blog_section); ?>');">

                        <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif ($section['id'] == 'courses') { ?>
                <?php $disable_eventgoal_section = act_outs_get_option('disable_courses_section');
                if (true == $disable_eventgoal_section) : ?>

                    <section id="<?php echo esc_attr($section['id']); ?>">
                        <div class="wrapper">
                            <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                        </div>
                    </section>

                <?php endif; ?>
            <?php } elseif (($section['id'] == 'featured-slider')) { ?>
                <?php $disable_featured_slider = act_outs_get_option('disable_featured-slider_section');
                if (true == $disable_featured_slider) : ?>

                    <section id="<?php echo esc_attr($section['id']); ?>">
                        <div class="wrapper"> <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?></div>

                    </section>
                <?php endif; ?>

            <?php } elseif ($section['id'] == 'about') { ?>
                <?php $disable_about_section = act_outs_get_option('disable_about_section');
                if (true == $disable_about_section) : ?>

                    <section id="<?php echo esc_attr($section['id']); ?>">
                        <div class="wrapper">
                            <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                        </div>
                    </section>

                <?php endif; ?>

            <?php } elseif ($section['id'] == 'single-event') { ?>
                <?php $disable_single_event_section = act_outs_get_option('disable_single-event_section');
                if (true == $disable_single_event_section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>">
                        <div class="wrapper">
                            <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                        </div>
                    </section>
                <?php endif; ?>
            <?php } elseif ($section['id'] == 'message') { ?>
                <?php $disable_message_section = act_outs_get_option('disable_message_section');
                if (true == $disable_message_section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="page-section relative">

                        <div class="wrapper">
                            <?php get_template_part('inc/sections/section', esc_attr($section['id'])); ?>
                        </div>

                    </section>
<?php endif;
            }
        }
    } elseif ('posts' == get_option('show_on_front')) {
        include(get_home_template());
    }
    get_footer();
} else {
    include(get_home_template());
}
