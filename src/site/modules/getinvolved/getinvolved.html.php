<div class="getinvolved">
  <?php echo $module->anchor() ?>
  <div class="inner">
    <div class="maintitle">
      <h2><?php echo $module->maintitle()->html() ?></h2>
      <p><?php echo $module->text()->html() ?></p>
    </div>

    <div class="contacts">
    <?php foreach($module->survey()->toStructure() as $item): ?>
      <div class="contactform">
        <h3><?php echo $item->title()->html() ?></h3>
        <div class="wwww">
          <h4>What:</h4>
          <?php echo $item->what()->html() ?>
        </div> 
        <div class="wwww">
          <h4>Who:</h4>
          <?php echo $item->who()->html() ?>
        </div>
        <div class="wwww">
          <h4>When:</h4>
          <?php echo $item->when()->html() ?>
        </div>
        <div class="wwww">
          <h4>Where:</h4>
          <?php echo $item->where()->html() ?>
        </div>
        <div class="linkcontact">
          <?php if($item->link()->isNotEmpty() and $item->linktext() != "Contact us"): ?>
            <a href="<?php echo $item->link()->url() ?>" class="button">
                <?php echo $item->linktext()->html() ?>
            </a>
          <?php elseif($item->linktext() == "Contact us"): ?>
            <a href="/contact-us" class="button">
                <?php echo $item->linktext()->html() ?>
            </a>
          <?php else: ?>
              <?php echo $item->linktext()->html() ?>
          <?php endif ?>
        </div>       
      </div>
    <?php endforeach ?>
    </div>

    <div class="lasttext">
      <?php if($module->lasttext()->isNotEmpty()): ?>
        <?php echo $module->lasttext()->kt()->html() ?>
      <?php endif ?>
    </div>
  </div>
</div>