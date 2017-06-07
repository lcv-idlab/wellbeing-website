<div class="wot">
  <?php if ($module->hidetitle()->isEmpty()): ?>
    <?php echo $module->anchor() ?>
    <h2><?php echo $module->title()->html() ?></h2>
  <?php endif ?>
  <?php foreach ($module->contents()->toStructure() as $section): ?>
    <div class="section">
      <?php if ($section->sectiontitle()->isNotEmpty()): ?>
        <?php if ($section->sectionanchor()->isNotEmpty()): ?>
          <?php echo Anchors::make($section->sectionanchor()->lower()->slug()->value, $section->sectiontitle()->html()) ?>
        <?php endif ?>
        <?php if ($module->hidetitle()->isEmpty()): ?>
          <h3><?php echo $section->sectiontitle()->html() ?></h3>
        <?php else: ?>
          <h2><?php echo $section->sectiontitle()->html() ?></h2>
        <?php endif ?>
      <?php endif ?>
      <div class="row">
        <div class="col"><?php echo $section->left()->kt() ?></div>
        <div class="col"><?php echo $section->right()->kt() ?></div>
      </div>
    </div>
  <?php endforeach ?>
</div>