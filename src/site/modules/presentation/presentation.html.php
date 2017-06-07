<div class="presentation">
  <?php echo $module->anchor() ?>
  <h2><?php echo $module->title()->html() ?></h2>

  <div class="organizations">
    <?php foreach ($module->organizations()->toStructure() as $org): ?>
      <div class="org">
        <h3><?php echo $org->name()->html() ?></h3>
        <?php echo $org->text()->kt() ?>
      </div>
    <?php endforeach ?>
  </div>

  <h2><?php echo $module->peopletitle()->html() ?></h2>

  <div class="people">
    <?php foreach ($module->people()->toStructure() as $person): ?>
      <div class="person">
        <div class="img">
          <?php echo $module->image($person->img()) ?>
        </div>
        <div class="name">
          <?php echo $person->name()->html() ?>
        </div>
        <div class="org">
          <?php echo $person->organization()->html() ?>
        </div>
        <div class="position">
          <?php echo $person->position()->kt() ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>