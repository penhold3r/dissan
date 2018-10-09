<?php
/*
 *--------------------------------------------
 * load CSS and JS
 */
function styles_and_scripts()
{
    // styles
    wp_enqueue_style('Dissan_Style', get_stylesheet_directory_uri() . '/css/style.dissan.css');
    // scripts
    wp_register_script('Dissan_Script', get_stylesheet_directory_uri() . '/js/bundle.dissan.js', '', '', true);
    $data = array('templateURL' => get_stylesheet_directory_uri());
    wp_localize_script('Dissan_Script', 'theme', $data);
    wp_enqueue_script('Dissan_Script');
}

add_action('wp_enqueue_scripts', 'styles_and_scripts');