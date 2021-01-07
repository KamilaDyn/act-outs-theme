<?php

/**
 * Active callback functions.
 *
 * @package act-outs
 */

function act_outs_welcome_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_welcome_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

/*---------------------------------------------------------------------------*/


function act_outs_courses_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_courses_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}


/*-------------------------------------------------------------------*/

function act_outs_about_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_about_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

/*-------------------------------------------------------------------*/

function act_outs_gallery_slider_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_gallery-slider_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

function act_outs_header_title($control)
{
    if ($control->manager->get_setting('theme_options[disable_header_title]')->value() == true) {
        return true;
    } else {
        return false;
    }
}


function act_outs_slider_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_featured-slider_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

function act_outs_blog_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_blog_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}


function act_outs_message_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_message_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}


/**
 * Active Callback for top bar section 
 */
function act_outs_contact_info_ac($control)
{

    if ($control->manager->get_setting('theme_options[disable_show_header_contact_info]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

function act_outs_login_button($control)
{

    if ($control->manager->get_setting('theme_options[disable_show_login_btn]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

/*-------------------------------------------------------------------*/

function act_outs_social_links_active($control)
{
    if ($control->manager->get_setting('theme_options[show_header_social_links]')->value() == true) {
        return true;
    } else {
        return false;
    }
}

/*-------------------------------------------------------------------*/

function act_outs_single_event_active($control)
{
    if ($control->manager->get_setting('theme_options[disable_single-event_section]')->value() == true) {
        return true;
    } else {
        return false;
    }
}
