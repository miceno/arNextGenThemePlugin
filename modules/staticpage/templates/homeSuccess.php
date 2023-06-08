<?php decorate_with('layout_1col'); ?>

<?php slot('title'); ?>
  <h1 class="title"><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
<?php end_slot(); ?>

<?php slot('sidebar'); ?>

  <?php echo get_component('menu', 'staticPagesMenu'); ?>

  <?php echo get_partial('browse_menu'); ?>

  <?php echo get_component('default', 'popular', [
      'limit' => 10,
      'sf_cache_key' => $sf_user->getCulture(),
  ]); ?>

<?php end_slot(); ?>

<div class="container box details">
    <div class="row hidden-phone hidden-tablet">
        <div class="col-3 browse-menu">
            <?php echo get_partial('browse_menu'); ?>
        </div>
        <div class="col-9 text-center organization-title pull-right">
            <!-- TODO: use title of site or organization name setting -->
            <h1>Arxiu Històric del Poblenou</h1>
        </div>
    </div>
    <div class="row hidden-desktop">
        <div class="col text-center organization-title">
            <!-- TODO: use title of site or organization name setting -->
            <h1>Arxiu Històric del Poblenou</h1>
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
