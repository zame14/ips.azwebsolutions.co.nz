<?php
vc_map( array(
    "name" => __("Sidebar CTA"),
    "base" => "ips_sidebar_cta",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'CTA for sidebar',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title"),
            "param_name" => "title",
        ),
        array(
            "type" => "attach_image",
            "heading" => __("CTA Image"),
            "param_name" => "image",
        ),
        array(
            "type" => "textfield",
            "heading" => __("CTA Message"),
            "param_name" => "message",
        ),
        array(
            "type" => "textfield",
            "heading" => __("CTA Link"),
            "param_name" => "link",
        ),
    )
));
add_shortcode('ips_sidebar_cta', 'sidebarCTA');
function sidebarCTA($atts) {
    $args = shortcode_atts( array(
        'image' => '',
        'title' => '',
        'message' => '',
        'link' => ''
    ), $atts);
    $imageid= intval($args['image']);
    $img = wp_get_attachment_image_src($imageid, 'sidebar-cta');
    $title = $args['title'];
    $message = $args['message'];
    $newsletter = getNewsletters('school','', 1);
    $link = $args['link'];
    $target = '';
    if ($title == "School Newsletter") {
        $link = $newsletter[0]->getFile();
        $target = 'target="_blank"';
    }
    $html = '
    <div class="cta-wrapper">
        <div class="title">' . $title . '</div>
        <a href="' . $link . '" ' . $target . '>
            <div class="image-wrapper">
                <img src="' . $img[0] . '" alt="" />
            </div>
            <div class="msg-wrapper">' . $message . '</div>
        </a>
    </div>';

    return $html;
}