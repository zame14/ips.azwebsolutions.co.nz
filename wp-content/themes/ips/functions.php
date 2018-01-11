<?php
require_once('modal/class.Base.php');
require_once('modal/class.Newsletter.php');
require_once('modal/class.Setting.php');
require_once('modal/class.Event.php');
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
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.css');
    wp_enqueue_script('tether-js', get_stylesheet_directory_uri() . '/js/tether.min.js?' . filemtime(get_stylesheet_directory() . '/js/tether.min.js'), array('jquery'));
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.js');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/masonry-layout/dist/masonry.pkgd.js');
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
add_image_size( 'sidebar-cta', 400, 400, true );
add_image_size( 'event-feature', 767, 511, true );
add_image_size( 'gallery', 767);

add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}
function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT ID FROM wp_posts WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->ID;
}
function getNewsletters($order = 'DESC', $limit = -1) {
    $newsletters = Array();
    $posts_array = get_posts([
        'post_type' => 'newsletter',
        'post_status' => 'publish',
        'numberposts' => $limit,
        'orderby' => 'ID',
        'order' => $order,
    ]);
    foreach ($posts_array as $post) {
        $newsletter = new Newsletter($post);
        $newsletters[] = $newsletter;
    }
    return $newsletters;
}
function getEvents($limit = -1) {
    $events = Array();
    $posts_array = get_posts([
        'post_type' => 'event',
        'post_status' => 'publish',
        'numberposts' => $limit,
        'orderby' => 'ID',
        'order' => 'DESC',
    ]);
    foreach ($posts_array as $post) {
        $event = new Event($post);
        $events[] = $event;
    }
    return $events;
}
function learningLinksMenu() {
    $html = '
    <ul class="learning-links-menu">
        <li><a href="' . get_page_link(114) . '#writing" class="writing">Writing</a></li>
        <li><a href="' . get_page_link(114) . '#math" class="math">Math</a></li>
        <li><a href="' . get_page_link(114) . '#science" class="science">Science</a></li>
        <li><a href="' . get_page_link(114) . '#reading" class="reading">Reading</a></li>
        <li><a href="' . get_page_link(114) . '#spelling" class="spelling">Spelling</a></li>
    </ul>';

    return $html;
}