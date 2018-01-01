<?php
require_once('modal/class.Base.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
// Load custom visual composer templates
loadVCTemplates();
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'tether-css', get_stylesheet_directory_uri() . '/css/tether.min.css?' . filemtime(get_stylesheet_directory() . '/css/tether.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style( 'google_font_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600');
    wp_enqueue_style( 'google_font_cabin', 'https://fonts.googleapis.com/css?family=Cabin:400,700');
    wp_enqueue_style( 'google_font_montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_script('tether-js', get_stylesheet_directory_uri() . '/js/tether.min.js?' . filemtime(get_stylesheet_directory() . '/js/tether.min.js'), array('jquery'));
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_image_size( 'home-banner', 2000, 800, true );

add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}
function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT post_id FROM wp_toolset_post_guid_id WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->post_id;
}