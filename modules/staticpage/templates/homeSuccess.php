<?php decorate_with('layout_1col'); ?>

<div class="g-0 m-0 p-0 container box details">
    <div class="g-0 m-0 mb-3 p-0 row d-none d-lg-flex">
        <div class="col-3">
            <?php echo get_partial('browse_menu'); ?>
        </div>
        <div class="col-9">
            <div class="h-100 text-center text-white bg-image bg-image-one d-flex justify-content-center align-items-center">
                <h1 class="text-shadow display-4 fw-bold">
                    <?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="row d-lg-none">
        <div class="col text-center organization-title">
            <h1><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
        </div>
    </div>
</div>

<div class="container box projects">
    <div class="row">
        <div class="col-md-4 who-are-we mt-lg-n5 p-4 order-lg-2">
            <?php echo render_value_html($sf_data->getRaw('content')); ?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <h2><?php echo __("Archival and other holdings");?></h2>
            </div>
            <div class="row">
                <div class="card col-md text-center m-1">
                    <a href="https://www.arxiuhistoricpoblenou.cat/mapes/" class="stretched-link">
                        <img class="card-img-top" src="https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=126360">
                    </a>
                    <div class="card-body">
                        <?php echo __("Maps"); ?>
                    </div>
                </div>
                <div class="card col-md text-center m-1">
                    <a class="stretched-link" href="https://atom.arxiuhistoricpoblenou.cat/index.php/josep-maria-huertas-claveria-2;isad?sf_culture=ca">
                        <img class="card-img-top" src="https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=25225"
                             alt="09125 Josep Maria Huertas [2005]" />
                    </a>
                    <div class="card-body">
                        <?php echo __("Holdings"); ?> Huertas Claveria
                    </div>
                </div>
                <div class="card col-md text-center m-1">
                    <a class="stretched-link" href="https://atom.arxiuhistoricpoblenou.cat/index.php/ateneu-colon?sf_culture=ca">
                        <img class="card-img-top" <img src="https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=105897" alt="11892 Ateneo Colón 1964" />
                    </a>
                    <div class="card-body">
                        <?php echo __("Holdings"); ?> Ateneu Colon
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner p-3">
                    <h1 class="fw-bold text-white text-center">
                        <a href="https://www.arxiuhistoricpoblenou.cat/mapes/">
                            <?php echo __("Maps"); ?>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container box">
  <div class="row">
    <div id="carouselHomePage" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHomePage" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner w-100">
            <?php foreach ($carouselItemsCulture as $i => $item) { ?>
              <div class="carousel-item h-100 <?php if ($i == 0) { echo "active";} ?>">
                <a href="<?php echo $item['url'] ?? '#'; ?>"
                   target="_blank"
                   class="<?php echo $item['class'] ?? 'text-white text-decoration-none'; ?>"
                   title="<?php echo $item['title'] ?? ''; ?>">
                      <?php echo image_tag($item['image'] ?? '',
                          ['class' => 'd-block h-100 mx-auto',
                           'alt' => strip_markdown($item['title'] ?? '')]); ?>
                  <div class="text-shadow carousel-caption d-none d-md-block">
                    <h5><?php echo $item['title']?></h5>
                    <p><?php echo $item['description']?></p>
                  </div>
                </a>
              </div>
            <?php } /* foreach $carouselItems */ ?>
        </div>
        <button class="carousel-control-prev carousel-dark" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next carousel-dark" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
</div>
<?php if (QubitAcl::check($resource, 'update')) { ?>
  <?php slot('after-content'); ?>
    <section class="actions mb-3">
      <?php echo link_to(__('Edit'), [$resource, 'module' => 'staticpage', 'action' => 'edit'], ['class' => 'btn atom-btn-outline-light']); ?>
    </section>
  <?php end_slot(); ?>
<?php } ?>
