<?php
vc_map( array(
    "name"                    => __( "Events" ),
    "base"                    => "ips_events",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'ips_events', 'events' );

function events() {
    $html = '
    <div class="row vc_row-o-equal-height vc_row-flex events">';
    foreach(getEvents() as $event) {
        $imageid = getImageID($event->getFeatureImage());
        $img = wp_get_attachment_image_src($imageid, 'event-feature');
        $html .= '
        <div class="col-xs-12 col-sm-6 col-md-6 the-event">
            <a href="' . $event->link() . '">
                <div class="inner-wrapper">
                    <img src="' . $img[0] . '" alt="' . $event->getTitle() . '" />
                    <h2>' . $event->getTitle() . '</h2>
                </div>
            </a>
        </div>';
    }
    $html .= '</div>';

    return $html;
}