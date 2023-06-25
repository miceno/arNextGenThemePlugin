<?php decorate_with('layout_2col.php'); ?>

<?php slot('sidebar'); ?>

  <?php echo get_component('settings', 'menu'); ?>

<?php end_slot(); ?>

<?php slot('title'); ?>

  <h1><?php echo __('Next Generation Theme settings'); ?></h1>

<?php end_slot(); ?>

<?php slot('content'); ?>

  <?php echo $form->renderGlobalErrors(); ?>

  <?php echo $form->renderFormTag(url_for(['module' => 'ahNextGenThemeAdmin', 'action' => 'themeAdmin'])); ?>

    <?php echo $form->renderHiddenFields(); ?>

    <div id="content">
        <?php echo $form->render(); ?>
    </div>

    <section class="actions mb-3">
        <input class="btn atom-btn-outline-success" type="submit" value="<?php echo __('Save'); ?>"/>
    </section>
  </form>

<?php end_slot(); ?>
