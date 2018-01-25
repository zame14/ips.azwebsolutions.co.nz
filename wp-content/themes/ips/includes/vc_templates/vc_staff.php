<?php
vc_map( array(
    "name" => __("IPS Staff"),
    "base" => "ips_staff",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'IPS Staff Members',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Category"),
            "param_name" => "category",
            "value" => Array('Panitahi Whanau', 'Panitahi Whanau Y1', 'Pouakai Whanau Y3/Y4', 'Pouakai Whanau Y5/Y6', 'Puke Haupapa Whanau', 'Non Teaching Positions - Principals', 'Non Teaching Positions - Other', 'Ancillary', 'Caretaking / Cleaning', 'Support Staff', 'Dental Therapists', 'Public Health Nurse')
        ),
    )
));
add_shortcode('ips_staff', function ($atts) {
    $args = vc_map_get_attributes('ips_staff', $atts);
    $cat = $args['category'];

    $staff_members = getStaffMembers($cat);

    $i = 1;
    $html = '
    <div class="staff-wrapper row">';
    foreach($staff_members as $staff) {
        $position = $staff->getPosition();
        if($staff->getAdditionalInfo() <> "") $position .= '<i>*</i>';
        $html .= '
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 staff" id="staff-' . $staff->id() . '">
            <div class="staff-inner-wrapper" data-id="' . $staff->id() . '" data-colid="' . $i . '">
                <div class="image-wrapper">
                    <img src="' . $staff->getImage() . '" alt="' . $staff->getTitle() . '" />';
                    if($staff->getEmail() <> "") {
                        $html .= '<a href="mailto:' . $staff->getEmail() . '" class="fa fa-envelope"></a>';
                    }
                $html .= '    
                </div>
                <h3>' . $staff->getTitle() . '</h3>
                <p class="position">' . $position . '</p>';
                if($staff->getPosition2() <> "") {
                    $html.= '<p class="position pos2">' . $staff->getPosition2() . '</p>';
                }
                if($staff->getClassroom() <> "") {
                    $html .= '<p class="classroom">' . $staff->getClassroom() . '</p>';
                }
                if($staff->getAdditionalInfo() <> "") {
                    $html .= '<p class="additional-info">* ' . $staff->getAdditionalInfo() . '</p>';
                }
                $html .= '
                <img src="' . get_stylesheet_directory_uri() . '/images/loader.gif" alt="" class="loader" />
            </div>
        </div>';
        $i++;
    }
    $html .= '    
    </div>';

    return $html;
});