<?php decorate_with('layout_1col'); ?>

<div class="container box details">
    <div class="row d-none d-md-flex">
        <div class="col-3">
            <?php echo get_partial('browse_menu'); ?>
        </div>
        <div class="col-9">
            <div class="px-4 pt-5 my-5 text-center bg-image bg-image-one">
                <h1 class="display-4 fw-bold text-body-emphasis">
                    <?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?>
                </h1>
                <div class="page p-3">
                    <?php echo render_value_html($sf_data->getRaw('content')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-md-none">
        <div class="col text-center organization-title">
            <h1><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
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
