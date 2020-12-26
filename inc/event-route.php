<?php

add_action('rest_api_init', 'act_outs_register_event');

function act_outs_register_event()
{
    register_rest_route('actouts/v1', 'event', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'act_outs_event_results'
    ));
}

function act_outs_event_results($data)
{
    $mainQuery = new WP_Query(array(
        'post_type' => array('event'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'events' => array(),

    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();
        $content = apply_filters('the_content', get_the_content());
        $eventData = new DateTime(get_field('event_date'));

        $eventEnd = new DateTime(get_field('event_end'));
        if (get_post_type() == 'event') {
            array_push($results['events'], array(
                'id' => get_the_ID(),
                'name' => get_the_title(),
                'description' => get_field('event_description'),
                'permalink' =>  get_the_permalink(),
                'date' => [$eventData->format('F/d/Y'), get_field('event_end') ? $eventEnd->format('F/d/Y') : $eventData->format('F/d/Y')],
                'color' => get_field('event_color'),
                'type' => get_field('event_type'),
            ));
        }
    }
    wp_reset_postdata();

    return $results;
}
