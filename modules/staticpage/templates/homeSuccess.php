<?php decorate_with('layout_1col'); ?>

<div class="g-0 m-0 p-0 container box details">
    <div class="g-0 m-0 p-0 row d-none d-md-flex">
        <div class="col-3">
            <?php echo get_partial('browse_menu'); ?>
        </div>
        <div class="col-9">
            <div class="text-center text-white bg-image bg-image-one d-flex justify-content-center align-items-center">
                <h1 class="text-shadow display-4 fw-bold text-body-emphasis">
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

<div class="container box">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-8 projects">
                    <h2>Projectes destacats</h2>
                </div>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails projects">
                    <li class="col">
                        <div class="thumbnail">
                            <a href="/9jo02">
                                <div class="image">
                                    <img src="/images/../plugins/arCCOOCatalunyaPlugin/i18n/projects/project1.jpg">                </div>
                                <div class="caption text-center">
                                    <h3>
                                        Advocats laboralistes                  </h3>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="col">
                        <div class="thumbnail">
                            <a href="/comissions-obreres-de-catalunya-seccio-sindical-de-la-papelera-espa-nola">
                                <div class="image">
                                    <img src="/images/../plugins/arCCOOCatalunyaPlugin/i18n/projects/project2.jpg">                </div>
                                <div class="caption text-center">
                                    <h3>
                                        Arxius de relacions laborals                  </h3>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="col">
                        <div class="thumbnail">
                            <a href="/f39xs">
                                <div class="image">
                                    <img src="/images/../plugins/arCCOOCatalunyaPlugin/i18n/projects/project3.jpg">                </div>
                                <div class="caption text-center">
                                    <h3>
                                        Col·lecció Biografies Obreres i fonts orals                  </h3>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-8 banner">
                    <h2 class="text-center">
                        <a href="https://sites.google.com/a/ccoo.cat/copia-topcat/">
                            TOPCAT 1963-1977. L’antifranquisme davant el TOP
                        </a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-4 who-are-we">
            <?php echo render_value_html($sf_data->getRaw('content')); ?>
        </div>
    </div>
</div>

<div class="page p-3">
    <?php echo render_value_html($sf_data->getRaw('content')); ?>
</div>


<?php if (QubitAcl::check($resource, 'update')) { ?>
  <?php slot('after-content'); ?>
    <section class="actions mb-3">
      <?php echo link_to(__('Edit'), [$resource, 'module' => 'staticpage', 'action' => 'edit'], ['class' => 'btn atom-btn-outline-light']); ?>
    </section>
  <?php end_slot(); ?>
<?php } ?>
