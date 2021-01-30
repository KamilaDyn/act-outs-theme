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
        'dataSource' => array(),

    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();
        $eventData = new DateTime(get_field('event_start'));
        $eventEnd = new DateTime(get_field('event_end'));

        // $data = new Date();
        if (get_post_type() == 'event') {
            array_push($results['dataSource'], array(
                'id' => get_the_ID(),
                'name' => get_the_title(),
                'description' => get_field('event_description'),
                'permalink' =>  get_the_permalink(),
                'color' => get_field('event_color'),
                'type' => get_field('event_type'),
                'priority' => get_field('priority'),
                'display' => get_field('display'),
                "startDate" => 'new Date(' . $eventData->format('Y, m, d') . ')',
                "endDate" => 'new Date(' . $eventEnd->format('Y, m, d') . ')',
            ));
        }
    }
    wp_reset_postdata();

    return $results;
}
