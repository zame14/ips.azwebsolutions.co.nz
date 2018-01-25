<?php
vc_map( array(
    "name"                    => __( "Stationery CTA" ),
    "base"                    => "ips_stationary_cta",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'ips_stationary_cta', 'stationaryCTA' );

function stationaryCTA() {
    $setting = new Setting(111);
    $html = '
    <div class="stationary-cta-wrapper">
        <a href="' . $setting->getStationaryList() . '">' . date('Y') . ' Stationery List</a>
    </div>';

    return $html;
}