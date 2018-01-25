<!-- The WooCommerce loop -->
<div class="spacer-60"></div>
<?php
$args = array(
    'delimiter' => ' <span>/</span> ',
    'home' => 'You are here:'
);
//woocommerce_breadcrumb($args);
woocommerce_content();
?>
<div class="spacer-80"></div>