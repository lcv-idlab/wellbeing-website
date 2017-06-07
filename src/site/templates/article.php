<?php snippet('header') ?>

<article class="news">
  <?php if (count($page->images()) > 0): ?>
    <?php $firstImage = $page->images()->sortBy('sort', 'asc')->first(); ?>
    <a class="first-image" data-fancybox="gallery" href="<?php echo $firstImage->resize(1900, 1200)->url() ?>">  
      <?php echo $firstImage->crop(1200, 450) ?>
    </a>
  <?php endif ?>
  
  <div class="row">
    <div class="col">
      <div class="text">
        <h1><?php echo $page->title()->html() ?></h1>
        <div class="subtitle"><?php echo $page->subtitle()->html() ?></div>
        <?php echo $page->text()->kt() ?>
      </div>
    </div>
    <div class="col">
      <?php if (count($page->images()) > 1): ?>
        <div class="gallery">
          <?php foreach ($page->images()->sortBy('sort', 'asc')->offset(1) as $img): ?>
            <a data-fancybox="gallery" href="<?php echo $img->resize(1900, 1200)->url() ?>">
              <?php echo $img->crop(400,400) ?>
            </a>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</article>

<?php snippet('footer') ?>