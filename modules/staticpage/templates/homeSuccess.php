<?php decorate_with('layout_1col'); ?>

<div class="g-0 m-0 p-0 container box details">
    <div class="g-0 m-0 p-0 row d-none d-md-flex">
        <div class="col-3">
            <?php echo get_partial('browse_menu'); ?>
        </div>
        <div class="col-9">
            <div class="text-center text-white bg-image bg-image-one d-flex justify-content-center align-items-center">
                <h1 class="text-shadow display-4 fw-bold">
                    <?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="row d-md-none">
        <div class="col text-center organization-title">
            <h1><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
        </div>
    </div>
</div>

<div class="container box projects">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <h2><?php echo __("Featured projects");?></h2>
            </div>
            <div class="row">
                <div class="card col text-center m-1">
                    <a href="/9jo02" class="stretched-link">
                        <img class="card-img-top" src="https://ccoo.cat.accesstomemory.net/plugins/arCCOOCatalunyaPlugin/i18n/projects/project1.jpg">
                    </a>
                    <div class="card-body">
                        <?php echo __("Maps"); ?>
                    </div>
                </div>
                <div class="card col text-center m-1">
                    <a class="stretched-link" href="/comissions-obreres-de-catalunya-seccio-sindical-de-la-papelera-espa-nola">
                        <img class="card-img-top" src="https://ccoo.cat.accesstomemory.net/plugins/arCCOOCatalunyaPlugin/i18n/projects/project2.jpg">
                    </a>
                    <div class="card-body">
                        Arxiu Huertas Claveria
                    </div>
                </div>
                <div class="card col text-center m-1">
                    <a class="stretched-link" href="/f39xs">
                        <img class="card-img-top" src="https://ccoo.cat.accesstomemory.net/plugins/arCCOOCatalunyaPlugin/i18n/projects/project3.jpg">
                    </a>
                    <div class="card-body">
                        Arxiu Ateneu Colon
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner p-3">
                    <h1 class="fw-bold text-white text-center">
                        <a href="https://sites.google.com/a/ccoo.cat/copia-topcat/">
                            <?php echo __("Maps"); ?>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-4 who-are-we">
            <?php echo render_value_html($sf_data->getRaw('content')); ?>
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
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?php echo link_to(
                    image_tag('https://fotos.arxiuhistoricpoblenou.cat/fotografia/arxiufotografic/10836-Proteccio__-de-menors-1954.html"><img src="https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=100047',
                        ['class'=>"d-block w-100", 'alt' => __('10836 Protecció de menors 1954')]),
                    'https://fotos.arxiuhistoricpoblenou.cat/fotografia/arxiufotografic/10836-Proteccio__-de-menors-1954.html',
                    ['target'=> '_blank', 'title' => __('10836 Protecció de menors 1954')]); ?>
                <div class="carousel-caption d-none d-md-block">
                    <h5>10836 Protecció de menors 1954</h5>
                    <p>Protecció de menors (La Prote). Nens amb les bótes de
                        llet de l'ajuda USA.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <?php echo link_to(
                        image_tag("https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=163253",
                            ['class'=>"d-block w-100", 'alt' => __('20689 Centenari del ferrocarril 1948')]),
                        'https://fotos.arxiuhistoricpoblenou.cat/fotografia/arxiufotografic/20689-Centenari-del-ferrocarril-1948.html',
                    ['target'=> '_blank', 'title' => __('20689 Centenari del ferrocarril 1948')]); ?>
                <div class="carousel-caption d-none d-md-block">
                    <h5>20689 Centenari del ferrocarril 1948</h5>
                    <p>Centenari del ferrocarril. La locomotora "cocodril" 7510 sortint
                        de l'Estació de França.</p>
                </div>
            </div>
            <div class="carousel-item">
                <?php echo link_to(
                        image_tag("https://fotos.arxiuhistoricpoblenou.cat/main.php?g2_view=core.DownloadItem&g2_itemId=6611",
                            ['class'=>"d-block w-100", 'alt' => __('04803 La Vanguardia [1960]')]),
                    'https://fotos.arxiuhistoricpoblenou.cat/fotografia/arxiufotografic/4803+La+Vanguardia+_1960_.html',
                    ['target'=> '_blank', 'title' => __('04803 La Vanguardia [1960]')]); ?>
                <div class="carousel-caption d-none d-md-block">
                    <h5>04803 La Vanguardia [1960]</h5>
                    <p>Repartidor de diaris de La Vanguardia, amb carro i cavall.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
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
