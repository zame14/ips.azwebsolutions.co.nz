<?php
$setting = new Setting(111);
?>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 f-col-1">
                            <h3>Inglewood Primary School</h3>
                            <a href="<?=get_home_url()?>" class="footer-logo"><img src="<?=get_stylesheet_directory_uri()?>/images/footer-logo.png" alt="Inglewood Primary School" /></a>
                            <address>
                                33 Kelly Street, PO Box 48,<br />
                                Inglewood, Taranaki
                            </address>
                            <ul>
                                <li><a href="tel:<?=$setting->getPhone()?>" class="ph"><?=$setting->getPhone()?></a></li>
                                <li><a href="tel:<?=$setting->getMobile()?>" class="mobile"><?=$setting->getMobile()?></a></li>
                            </ul>
                            <a href="mailto:<?=$setting->getEmail()?>" class="email"><?=$setting->getEmail()?></a>
                            <div class="school-role">Current school role - <?=$setting->getSchoolRole()?></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 f-col-2">
                            <h3>Learning Links</h3>
                            <?=learningLinksMenu()?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 f-col-3">
                            <h3><?=date('Y')?> Term Dates</h3>
                            <?=$setting->getTermDates()?>
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
                &copy; Copyright <?=date('Y')?> Inglewood Primary School <span>-</span> Website by: <a href="http://www.azwebsolutions.co.nz" target="_blank">A-Z Web Solutions Ltd</a></div>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>