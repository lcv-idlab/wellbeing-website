<div class="activities">
  <?php echo $module->anchor() ?>

  <div class="intro">
    <h2><?php echo $module->title()->html() ?></h2>
    <div class="row">
      <div class="col"><?php echo $module->left()->kt() ?></div>
      <div class="col"><?php echo $module->right()->kt() ?></div>
    </div>
  </div>

  <div class="phases row">
    <div class="text col">
      <?php foreach ($module->phases()->toStructure() as $phase): ?>
        <div class="phase">
          <h3>
            <div class="title">
              <?php echo $phase->title()->html() ?>
            </div>
            <div class="name">
              <?php echo $phase->name()->html() ?>
            </div>
          </h3>
          <?php echo $phase->text()->kt() ?>
        </div>
      <?php endforeach ?>
    </div>
    <div class="img col">
      <?php echo $module->image($module->img())->width(600) ?>
    </div>
  </div>
</div>