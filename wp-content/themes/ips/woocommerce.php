<?php
get_header();
$object = get_queried_object();
$class = "product";
if(is_product_category()) $class = "category";
?>
<div id="woocommerce-wrapper" class="<?=$class?>">
    <div id="content" class="container">
        <div class="row">
            <div class="col-xl-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php get_template_part( 'loop-templates/content', 'woocommerce' ); ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
