<?php
vc_map( array(
    "name"                    => __( "REACH" ),
    "base"                    => "ips_reach",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'ips_reach', 'reachCTA' );

function reachCTA() {
    $html = '
    <div class="reach-wrapper">
        <ul>
            <li><span>R</span>espect - yourself, others & learning</li>
            <li><span>E</span>xpect - the best that you & others can be</li>
            <li><span>A</span>chieve - through opportunity & involvement</li>
            <li><span>C</span>ommunicate - effectively & appropriately</li>
            <li><span>H</span>auora - feel good about yourself, be safe</li>
        </ul>
    </div>';

    return $html;
}