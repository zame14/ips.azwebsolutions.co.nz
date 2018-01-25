<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
$excursion = new Excursion($post);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?=get_page_link(4)?>">Home</a></li>
                        <li><a href="<?=get_page_link(519)?>">Permission Slips</a></li>
                        <li><?=$excursion->getTitle()?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <h1><?=$excursion->getTitle()?></h1>
                <strong><?=$excursion->getContent()?></strong>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <?php
                    echo do_shortcode("[contact-form-7 id=527 title=Permission Slip]");
                ?>
            </div>
        </div>
    </div>
    <div class="spacer-80"></div>
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->