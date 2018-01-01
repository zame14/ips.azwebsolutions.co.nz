<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-1">
                            <h3>Inglewood Primary School</h3>
                            <a href="<?=get_home_url()?>" class="footer-logo"><img src="<?=get_stylesheet_directory_uri()?>/images/footer-logo.png" alt="Inglewood Primary School" /></a>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h3>Parent Information</h3>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h3><?=date('Y')?> Term Dates</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<section id="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                &copy; Copyright <?=date('Y')?> Inglewood Primary School - Website by: <a href="http://www.azwebsolutions.co.nz" target="_blank">A-Z Web Solutions Ltd</a></div>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>