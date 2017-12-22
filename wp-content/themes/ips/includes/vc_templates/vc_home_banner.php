<?php
vc_map( array(
    "name" => __("Home Banner"),
    "base" => "ips_home_banner",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'Banner for the home page',
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => __("Banner Images"),
            "param_name" => "images",
        ),
    )
));
add_shortcode('ips_home_banner', 'homeBanner');
function homeBanner($atts) {
    $args = shortcode_atts( array(
        'images' => ''
    ), $atts);
    $images = explode(',',$args['images']);
    shuffle($images);
    $img = wp_get_attachment_image_src($images[0], 'home-banner');

    $html = '
    <div class="home-banner-wrapper">
        <img src="' . $img[0] . '" alt="Inglewood Primary School" />
    </div>';

    return $html;
}