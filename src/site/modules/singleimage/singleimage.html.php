<div class="singleimage">
  <?php echo $module->image($module->img())->width(1200) ?>
  <?php if ($module->text()->isNotEmpty()): ?>
    <div class="text">
      <div class="inner">
        <?php echo $module->text()->kt() ?>
      </div>
    </div>
  <?php endif ?>
</div>