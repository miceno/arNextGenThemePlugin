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
                <div class="col-md-3 col-lg-4">
                    <p class="text-uppercase mb-lg-5">Follow and connect with us</p>
                    <ul class="list-unstyled d-flex flex-row justify-content-start">
                        <li class="d-flex flex-column me-3">
                            <a class="d-flex align-items-center p-0 text-white border rounded-circle" href="https://www.facebook.com/arxiuhistoricpoblenou/" target="_blank">
                                <i class="fab fa-facebook-f mx-auto" aria-hidden="true"></i><span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="d-flex flex-column me-3">
                            <a class="d-flex align-items-center p-0 text-white border rounded-circle" href="https://www.instagram.com/arxiuhistoricpoblenou/" target="_blank">
                                <i class="fab fa-instagram mx-auto" aria-hidden="true"></i><span class="visually-hidden">Instagram</span>
                            </a>
                        </li>
                        <li class="d-flex flex-column me-3">
                            <a class="d-flex align-items-center p-0 text-white border rounded-circle" href="https://www.youtube.com/channel/UCJPwaipU2S7UAOs5dkGN1GA" target="_blank">
                                <i class="fab fa-youtube mx-auto" aria-hidden="true"></i><span class="visually-hidden">Youtube</span>
                            </a>
                        </li>
                        <li class="d-flex flex-column me-3">
                            <a class="d-flex align-items-center p-0 text-white border rounded-circle" href="https://t.me/ArxiyHistoricPoblenou" target="_blank">
                                <i class="fab fa-telegram mx-auto" aria-hidden="true"></i><span class="visually-hidden">Telegram</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4">
                    <p class="text-uppercase mb-lg-5">Contact</p>
                    <p>
                        <a class="d-inline-block text-white border p-3" href="https://ask.unog.ch/archives">Ask an Archivist</a>
                    </p>
                    <p>
                        Palais des Nations<br>
                        1211 Geneva 1211, Switzerland<br>
                        Phone: +41 (0)22 917 1234<br>
                        <a class="text-white" href="https://www.google.com/maps/place/Palais+des+Nations/@46.2269806,6.1334386,602a,35y,90h,39.23t/data=!3m1!1e3!4m5!3m4!1s0x478c64fcaacb2e3f:0xbaabef97619cd473!8m2!3d46.2266053!4d6.1404813" target="_blank"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> See location</a>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <p class="text-uppercase mb-lg-5">Practical Information</p>
                    <div class="d-flex">
                        <ul class="list-unstyled">
                            <li><a class="text-white" href="https://www.ungeneva.org/en/knowledge/archives">Visit the Archives</a></li>
                            <li><a class="text-white" href="https://www.ungeneva.org/practical-information/services">Services operating hours</a></li>
                            <li><a class="text-white" href="https://www.ungeneva.org/about/accessibility"><i class="fab fa-accessible-icon" aria-hidden="true"></i> Accessibility</a></li>
                        </ul>
                    </div>
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
