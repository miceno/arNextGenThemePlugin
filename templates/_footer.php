<footer>

  <?php if (QubitAcl::check('userInterface', 'translate')) { ?>
    <?php echo get_component('sfTranslatePlugin', 'translate'); ?>
  <?php } ?>

  <?php echo get_component_slot('footer'); ?>

  <div id="print-date">
    <?php echo __('Printed: %d%', ['%d%' => date('Y-m-d')]); ?>
  </div>

  <div id="js-i18n">
    <div id="read-more-less-links"
      data-read-more-text="<?php echo __('Read more'); ?>" 
      data-read-less-text="<?php echo __('Read less'); ?>">
    </div>
  </div>

    <div class="footer-main bg-secondary text-white">
        <div class="container-xl">
            <div class="row py-3">
                <div class="col-md-3 col-lg-4 follow-us">
                    <p class="mb-lg-5"><?php echo __('Follow and connect with us');?></p>
                    <ul class="list-unstyled d-flex flex-row justify-content-start">
                        <li class="me-1">
                            <a class="btn btn-link btn-floating btn-lg m-1"
                               href="https://www.facebook.com/arxiuhistoricpoblenou/" target="_blank">
                               <i class="text-white fab fa-2x fa-facebook mx-auto"></i><span class="visually-hidden"><?php echo __('Facebook');?></span>
                            </a>
                        </li>
                        <li class="me-1">
                            <a class="btn btn-link btn-floating btn-lg m-1"
                               href="https://www.instagram.com/arxiuhistoricpoblenou/" target="_blank">
                               <i class="text-white fab fa-2x fa-instagram mx-auto"></i> <span class="visually-hidden"><?php echo __('Instagram'); ?></span>
                            </a>
                        </li>
                        <li class="me-1">
                            <a class="btn btn-link btn-floating btn-lg m-1"
                               href="https://www.youtube.com/channel/UCJPwaipU2S7UAOs5dkGN1GA" target="_blank">
                               <i class="text-white fab fa-2x fa-youtube mx-auto"></i> <span class="visually-hidden"><?php echo __('Youtube'); ?></span>
                            </a>
                        </li>
                        <li class="me-1">
                            <a class="btn btn-link btn-floating btn-lg m-1"
                               href="https://t.me/ArxiyHistoricPoblenou" target="_blank">
                               <i class="text-white fab fa-2x fa-telegram mx-auto"></i> <span class="visually-hidden"><?php echo __('Telegram'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4 contact">
                    <p class="mb-lg-5"><?php echo __('Contact'); ?></p>
                    <p>
                        <a class="d-inline-block text-white border p-3" href="https://www.arxiuhistoricpoblenou.cat">Arxiu Històric del Poblenou</a>
                    </p>
                    <p>
                        Torre de les Aigües del Besós <br/>
                        Plaça Ramon Calsina s/n <br/>
                        08019 Barcelona <br/>
                        <?php echo __('Telephone');?>: <a href="tel:93 564 77 03" data-type="tel" data-id="tel:93 564 77 03">93 564 77 03</a><br/>
                        <?php echo __('De dilluns a divendres de 17h a 19h');?><br/>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4 location">
                    <p><iframe class="footer-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.5333762328996!2d2.2100163147628327!3d41.405939002809035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a3449a19245d%3A0x7950f6bd1d4cb975!2sTorre+de+les+Aig%C3%BCes+del+Bes%C3%B2s!5e0!3m2!1sen!2ses!4v1551545739243" zoomcontrol="false" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-ownership pt-3 pb-2">
        <div class="d-flex justify-content-between">
            <div>
                <a href="" target="_blank">Terms of Use</a> |
                <a href="" target="_blank">Privacy Notice</a> |
                <a href="">Multilingualism Disclaimer</a>
            </div>
            <div>© <?php echo "Arxiu Històric del Poblenou";?></div>
        </div>
    </div>
</footer>

<?php $gaKey = sfConfig::get('app_google_analytics_api_key', ''); ?>
<?php if (!empty($gaKey)) { ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gaKey; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    <?php include_slot('google_analytics'); ?>
    gtag('config', '<?php echo $gaKey; ?>');
  </script>
<?php } ?>
