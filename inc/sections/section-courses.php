<?php

/**
 * Template part for displaying Event Goal Section
 *
 *@package act_outs
 */

$courses_title       = act_outs_get_option('course_title');

$content = apply_filters('the_content', get_the_content());
$video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
for ($i = 1; $i <= 4; $i++) :
  $course_page_posts[] = absint(act_outs_get_option('course_page_' . $i));
endfor;

if (!empty($courses_title)) : ?>
  <header class="section-header">
    <h2 class="section-title"><?php echo esc_html($courses_title); ?></h2>
  </header>
<?php endif; ?>
<div class="section-content  clear">
  <div class="articles-container">
    <?php
    $args = array(
      'post_type'     => 'page',
      'post_per_page' => 4,
      'post__in'      => $course_page_posts,
      'orderby'       => 'post__in',
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
      $i = 1;
      while ($loop->have_posts()) : $loop->the_post();
        $id = get_post_thumbnail_id();
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true); ?>
        <article>

          <div class="service-content">


            <div class="responsive-container ">

              <div class="img-preloader">
                <div class="img">
                  <?php the_post_thumbnail('video-poster'); ?>
                  <span class="watch play-icon">
                    <img src="<?php echo get_theme_file_uri('/assets/images/play-arrow.svg') ?>" alt="play-icon" title='play video'>

                  </span>
                </div>


                <div class="light">
                  <div class="container-btn">
                    <button class="closebtn">x</button>
                  </div>
                  <div class="wp-video">
                    <?php
                    $media = get_media_embedded_in_content(
                      apply_filters('the_content', get_the_content())
                    );
                    echo $media[0];
                    ?>
                  </div>

                </div>

              </div>
              <?php $single_title = act_outs_get_option('course_title_' . $i);
              if (!empty($single_title)) :
              ?>
                <div class="caption">
                  <h3><?php echo esc_attr($single_title) ?></h3>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </article>
        <?php $i++; ?>

      <?php endwhile; ?>
    <?php wp_reset_postdata();
    endif; ?>

  </div>
</div>