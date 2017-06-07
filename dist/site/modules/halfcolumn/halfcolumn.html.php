<div class="halfcolumn">
  <?php echo $module->anchor() ?>
  <div class="inner">
    <div class="text">
      <h2><?php echo $module->title()->html() ?></h2>
      <?php echo $module->text()->kt() ?>
    </div>
    <?php if ($module->img()->isNotEmpty()): ?>
      <div class="img">
        <?php echo $module->image($module->img())->width(600) ?>
      </div>
    <?php endif ?>
  </div>
</div>