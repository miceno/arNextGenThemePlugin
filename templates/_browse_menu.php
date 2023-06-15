<?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID); ?>
<?php if ($browseMenu->hasChildren()) { ?>
    <section class="card">
        <h2 class="h5 p-3 mb-0">
            <?php echo __('Browse by'); ?>
        </h2>
        <div class="list-group list-group-flush">
            <?php foreach ($browseMenu->getChildren() as $item) { ?>
                <a
                    class="list-group-item list-group-item-action"
                    href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>">
                    <?php echo esc_specialchars($item->getLabel(['cultureFallback' => true])); ?>
                </a>
            <?php } ?>
        </div>
    </section>
<?php } ?>