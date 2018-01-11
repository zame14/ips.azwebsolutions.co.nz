<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="spacer-60"></div>
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-xl-12">
                <h1>School Newsletters</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
                echo '<ul class="newsletters">';
                foreach(getNewsletters() as $newsletter) {
                    echo '<li><a href="' . $newsletter->getFile() . '" target="_blank">' . $newsletter->getTitle() . '</a>';
                }
                echo '</ul>';
                ?>
            </div>
        </div>
    </div>
    <div class="spacer-80"></div>
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->