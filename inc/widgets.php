<?php

/* register widget */

// widgets  for events




class events_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            // widget ID
            'events_widget',
            // widget name
            __('Events List', 'events_widget_domain'),
            // widget description
            array('description' => __('List of events', 'events_widget_domain'),)
        );
    }
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        //if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        //output
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
            'post_per_page' => 3,
            'post_type' => 'event',
            'meta_key' => 'event_start',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_start',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric',
                )
            )
        ));
?>
        <div class="widget-events ">
            <?php

            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post();

            ?>
                <div class="event-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('widget-event-small'); ?>
                        <div class="text">
                            <h2 class="entry-title"> <?php __(the_title(), 'events_widget_domain'); ?></h2>
                            <h3><?php
                                $eventDate = new DateTime(get_field('event_start'));
                                $eventEnd = new DateTime(get_field('event_end'));
                                echo __($eventDate->format('d.m.Y')); ?>
                                <?php if ($eventEnd > $eventDate) : echo  ' - ' . __($eventEnd->format('d.m.Y'));
                                endif; ?>

                            </h3>
                            <?php $content = strip_shortcodes(wp_trim_words(get_the_content(), 10));
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            echo $content; ?>
                        </div>
                    </a>

                </div>
                <hr>
            <?php        }

            echo $args['after_widget'];
            ?>
        </div>
    <?php
    }
    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Current events', 'events_widget_domain');
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php ?>"></label>
        </p>
    <?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


class social_links_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            // widget ID
            'social_links_widget',
            // widget name
            __('Social Links List', 'social_links_widget_domain'),
            // widget description
            array(
                'description' => __('List of links', 'social_links_widget'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $social_link1 = $instance['social_link1'];
        $social_link2 = $instance['social_link2'];

        $social_link3 = $instance['social_link3'];
        $social_link4 = $instance['social_link4'];

        // social profile links
        $social_link1_profile = '<li><a href="' . esc_url($social_link1) . '" target="_blank" title="' . esc_url($social_link1) . '" ></a></li>';
        $social_link2_profile = '<li><a href="' . esc_url($social_link2) . '" target="_blank" title="' . esc_url($social_link2) . '" ></a></li>';
        $social_link3_profile = '<li><a href="' . esc_url($social_link3) . '" target="_blank" title="' . esc_url($social_link3) . '" ></a></li>';
        $social_link4_profile = '<li><a href="' . esc_url($social_link4) . '" target="_blank" title="' . esc_url($social_link4) . '" ></a></li>';
        echo $args['before_widget'];
        //if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        //output

        echo '<div class="social-icons">';
        echo '<ul>';
        echo (!empty($social_link1)) ? $social_link1_profile : null;
        echo (!empty($social_link2)) ? $social_link2_profile : null;
        echo (!empty($social_link3)) ? $social_link3_profile : null;
        echo (!empty($social_link4)) ? $social_link4_profile : null;
        echo '</ul>';
        echo '</div>';
    }
    public function form($instance)
    {
        isset($instance['title']) ? $title = $instance['title'] :  $title = __('Social links list', 'social_links_widget_domain');

        isset($instance['social_link1']) ? $social_link1 = $instance['scocial_link1'] : null;
        isset($instance['social_link2']) ? $social_link2 = $instance['scocial_link2'] : null;
        isset($instance['social_link3']) ? $social_link3 = $instance['scocial_link3'] : null;
        isset($instance['social_link4']) ? $social_link3 = $instance['scocial_link4'] : null;



    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_link1'); ?>"><?php _e('Social Link 1:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_link1'); ?>" name="<?php echo $this->get_field_name('social_link1'); ?>" type="text" value="<?php echo esc_attr($social_link1); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_link2'); ?>"><?php _e('Social Link 2:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_link2'); ?>" name="<?php echo $this->get_field_name('social_link2'); ?>" type="text" value="<?php echo esc_attr($social_link2); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_link3'); ?>"><?php _e('Social Link 3:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_link3'); ?>" name="<?php echo $this->get_field_name('social_link3'); ?>" type="text" value="<?php echo esc_attr($social_link3); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_link4'); ?>"><?php _e('Social Link 4:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_link4'); ?>" name="<?php echo $this->get_field_name('social_link4'); ?>" type="text" value="<?php echo esc_attr($social_link4); ?>">
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['social_link1'] = (!empty($new_instance['social_link1'])) ? strip_tags($new_instance['social_link1']) : '';
        $instance['social_link2'] = (!empty($new_instance['social_link2'])) ? strip_tags($new_instance['social_link2']) : '';
        $instance['social_link3'] = (!empty($new_instance['social_link3'])) ? strip_tags($new_instance['social_link3']) : '';
        $instance['social_link4'] = (!empty($new_instance['social_link4'])) ? strip_tags($new_instance['social_link4']) : '';
        return $instance;
    }
}
