<?php
vc_map( array(
    "name"                    => __( "School Excursions" ),
    "base"                    => "ips_excursions",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'ips_excursions', 'schoolExcursions' );

function schoolExcursions() {
    if(count(getSchoolExcursions()) > 0) {
        $html = '
        <div class="excursions-wrapper">
            <ul>';
            foreach(getSchoolExcursions() as $excursion) {
                $html .= '<li><a href="' . $excursion->link() . '">' . $excursion->getTitle() . '</a></li>';
            }
            $html .= '
            </ul>
        </div>';
    } else {
        $html = '<p>No school excursions - check back soon!';
    }


    return $html;
}