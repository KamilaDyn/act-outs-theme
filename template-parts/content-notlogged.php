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

</div><!-- .entry-content -->