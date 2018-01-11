<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
$event = new Event($post);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?=get_page_link(4)?>">Home</a></li>
                        <li><a href="<?=get_page_link(56)?>">Events</a></li>
                        <li><?=$event->getTitle()?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <h1><?=$event->getTitle()?></h1>
                <?=$event->getContent()?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="gallery">
                    <?php
                    $i = 1;
                    foreach ($event->getGalleryImages() as $images) {
                        $imageid = getImageID($images);
                        $img = wp_get_attachment_image_src($imageid, 'gallery');
                        echo '
                        <figure class="gallery-item">
                            <div class="gallery-icon"><img src="' . wp_make_link_relative($img[0]) . '" alt="" onclick="openModal();currentSlide(' . $i . ')" /><span class="fa fa-search"></span></div>
                        </figure>';
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="row">
            <div class="col-xl-12 h2-wrapper"><h2>Other Events</h2></div>
        </div>
        <div class="row vc_row-o-equal-height vc_row-flex">
            <?php
            $n = 1;
            foreach(getEvents() as $other_event) {
                if($other_event->id() <> $post->ID) {
                    $imageid = getImageID($other_event->getFeatureImage());
                    $img = wp_get_attachment_image_src($imageid, 'event-feature');
                    echo '
                    <div class="col-xs-12 col-sm-6 col-md-4 other-events">
                        <a href="' . $other_event->link() . '">
                            <div class="inner-wrapper">
                                <img src="' . $img[0] . '" alt="' . $other_event->getTitle() . '" />
                                <h3>' . $other_event->getTitle() . '</h3>
                            </div>
                        </a>                    
                    </div>';
                    $n++;
                }
                if($n == 4) break;
            }
            ?>
        </div>
    </div>
    <?php
    //lightbox
    $slides = count($event->getGalleryImages());
    $p = 1;
    $m = 1;
    echo '
    <div id="galleryModal" class="modal">
        <span class="fa fa-times" onclick="closeModal()"></span>
        <input type="hidden" name="viewed" class="viewed" value="" />
        <div class="modal-content">';
            foreach($event->getGalleryImages() as $images) {
                echo '
                <div class="slides slide' . $m . '">
                    <div class="navtext">' . $event->getTitle() . ' - ' . $m . ' / ' . $slides . '</div>
                    <img src="' . wp_make_link_relative($images) . '" alt="" />
                </div>';
                $m++;
            }
            echo '
            <a class="prev fa fa-angle-left" onclick="plusSlides(-1)"></a>
            <a class="next fa fa-angle-right" onclick="plusSlides(1)"></a>
            <div class="modal-thumbnail-wrapper">';
                foreach($event->getGalleryImages() as $images) {
                    echo '
                    <div class="modal-thumbnail">
                        <img src="' . wp_make_link_relative($images) . '" alt="" onclick="currentSlide(' . $p . ')" class="preview' . $p . '" />
                    </div>';
                    $p++;
                }
                echo '      
            </div>
        </div>
    </div>';
    ?>
    <div class="spacer-80"></div>
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->