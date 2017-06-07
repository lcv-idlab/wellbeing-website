<div class="slideshow">
  <?php foreach ($module->slides()->toStructure() as $slide): ?>
    <div class="slide">
      <?php echo $module->image($slide->img())->crop(1200, 450) ?>
      <?php if ($slide->text()->isNotEmpty()): ?>
        <div class="text">
          <?php echo $slide->text()->kt(); ?>
        </div>
      <?php endif ?>
    </div>
  <?php endforeach ?>
</div>