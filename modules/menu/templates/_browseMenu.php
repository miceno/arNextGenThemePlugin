<div class="my-2 me-3">
    <?php echo $browseMenu->getLabel(['cultureFallback' => true]); ?>
  <ul class="list-group mt-2" aria-labelledby="browse-menu">
    <?php foreach ($browseMenu->getChildren() as $child) { ?>
      <?php if ($child->checkUserAccess()) { ?>
          <?php echo link_to(
              $child->getLabel(['cultureFallback' => true]),
              $child->getPath(['getUrl' => true, 'resolveAlias' => true]),
              ['class' => 'list-group-item',
                'id' => isset($child->name) ? "node_".$child->name : ''  ]
          ); ?>
      <?php } ?>
    <?php } ?>
  </ul>
</div>
