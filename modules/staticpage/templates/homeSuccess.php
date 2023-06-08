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
