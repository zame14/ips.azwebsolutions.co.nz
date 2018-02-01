<?php
$title = '';
$message = 'Check back again soon!';
?>
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
            </div>
            <?php
            for($i = 1; $i <= 5; $i++) {
                switch ($i) {
                    case 1:
                        $newsletters = getNewsletters('school');
                        break;
                    case 2:
                        $newsletters = getNewsletters('junior');
                        $title = 'Junior Newsletters';
                        break;
                    case 3:
                        $newsletters = getNewsletters('middle-team');
                        $title = 'Middle Team Newsletters';
                        break;
                    case 4:
                        $newsletters = getNewsletters('senior-team');
                        $title = 'Senior Team Newsletters';
                        break;
                    case 5:
                        $newsletters = getNewsletters('intermediate-team');
                        $title = 'Intermediate Team Newsletters';
                        break;
                }
                echo '<div class="col-xl-12 newsletter-wrapper">';
                if($i > 1) echo '<h2>' . $title . '</h2>';
                if($newsletters) {
                    echo '<ul class="newsletters">';
                    foreach($newsletters as $newsletter) {
                        echo '<li><a href="' . $newsletter->getFile() . '" target="_blank">' . $newsletter->getTitle() . '</a>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>' . $message . '</p>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="spacer-80"></div>
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->