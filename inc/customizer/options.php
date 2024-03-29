<?php

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function act_outs_post_choices()
{
    $posts = get_posts(array('numberposts' => -1));
    $choices = array();
    $choices[0] = esc_html__('--Select--', 'act-outs');
    foreach ($posts as $post) {
        $choices[$post->ID] = $post->post_title;
    }
    return  $choices;
}

function act_outs_event_post_choices()
{

    $post_args = array(
        'post_type' => array('event', 'post'),
        'numberposts' => -1
    );
    $posts = get_posts($post_args);
    $choices = array();
    $choices[0] = esc_html__('--Select--', 'act-outs');
    foreach ($posts as $post) {
        $choices[$post->ID] = $post->post_title;
    }
    return  $choices;
}

function act_outs_featured_videos_post_choices()
{

    $post_args = array(
        'post_type' => array('featured-videos'),
        'numberposts' => -1
    );
    $posts = get_posts($post_args);
    $choices = array();
    $choices[0] = esc_html__('--Select--', 'act-outs');
    foreach ($posts as $post) {
        $choices[$post->ID] = $post->post_title;
    }
    return  $choices;
}

if (!function_exists('act_outs_switch_options')) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function act_outs_switch_options()
    {
        $arr = array(
            'on'        => esc_html__('Enable', 'act-outs'),
            'off'       => esc_html__('Disable', 'act-outs')
        );
        return apply_filters('act_outs_switch_options', $arr);
    }
endif;
