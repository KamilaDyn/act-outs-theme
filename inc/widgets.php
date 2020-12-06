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
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
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

                        <img src="<?php the_post_thumbnail_url('widget-event-small'); ?>" alt="<?php the_title(); ?>">

                        <div class="text">
                            <h2 class="entry-title"> <?php __(the_title(), 'events_widget_domain'); ?></h2>
                            <h3 class="entry-date"> <?php $eventDate = new DateTime(get_field('event_date'));
                                                    echo __($eventDate->format('d.m.Y') . 'r', 'events_widget_domain'); ?></h3>
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
