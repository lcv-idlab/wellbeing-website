<div class="newsteaser">
  <div class="text">
    <?php echo $module->text()->kt() ?>
    <a href="<?php echo $module->buttonlink()->html() ?>" class="button"><?php echo $module->buttontext()->html() ?></a>
  </div>
  <div class="newspreviews">
    <?php foreach (page('news')->children()->visible() as $news): ?>
      <a href="<?php echo $news->url() ?>" class="slide newsarticle">
        <img src="<?php echo $news->images()->sortBy('sort', 'asc')->first()->crop(400, 300)->url() ?>" alt="">
        <div class="title"><?php echo $news->title()->html() ?></div>
        <div class="subtitle"><?php echo $news->subtitle()->html() ?></div>
      </a>
    <?php endforeach ?>
  </div>
</div>