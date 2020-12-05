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
  <div class="section-header">
    <?php if (!empty($courses_title)) : ?>
      <h2 class="section-title"><?php echo esc_html($courses_title); ?></h2>
    <?php endif; ?>
  </div>
<?php endif; ?>
<div class="section-content  col-2 clear">
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
    while ($loop->have_posts()) : $loop->the_post(); ?>
      <article>

        <div class="service-content">


          <div class="entry-content">
            <div class="responsive-container ">

              <div class="img-preloader">
                <div class="img"><img src="<?php the_post_thumbnail_url('video-poster'); ?>">
                  <span class="watch play-icon"><img src="<?php echo get_theme_file_uri('/assets/images/play-arrow.svg') ?>" alt="play-icon" title='play video'></span>
                </div>
                <div class="caption">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="light">
                  <div class="container-btn">
                    <button class="closebtn">x</button>
                  </div>
                  <?php
                  $media = get_media_embedded_in_content(
                    apply_filters('the_content', get_the_content())
                  );
                  the_content('video');
                  ?>

                </div>



              </div>

            </div><!-- .entry-content -->

          </div>
        </div>
      </article>
      <?php $i++; ?>

    <?php endwhile; ?>
  <?php wp_reset_postdata();
  endif; ?>


</div>