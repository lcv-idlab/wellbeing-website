<div class="network">
  <?php echo $module->anchor() ?>
  <div class="inner">
    <div>
      <h2><?php echo $module->title()->html() ?></h2>
    </div>
    <div class="partnerlist">
    <?php foreach($module->partner()->toStructure() as $item): ?>
      <div class="partner">
        <h3><?php echo $item->name()->html() ?></h3>
      <div class="lowerpart">
        <div class="text">
          <?php echo $item->text()->kt() ?>
          <a href="<?php echo $item->link->url() ?>" target="_blank" class="textlink"><?php echo $item->link->url() ?></a>
        </div>
          <?php if ($item->logo()->isNotEmpty()): ?>
            <div class="img">
              <a href="<?php echo $item->link->url() ?>" target="_blank">
                <?php echo $module->image($item->logo())->width(350) ?>
              </a>
            </div>
          <?php endif ?>
        </div>
      </div>
    <?php endforeach ?>
    </div>
  </div>
</div>