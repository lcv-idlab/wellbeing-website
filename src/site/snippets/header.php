<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <?php echo js(['assets/js/vendor.js', 'assets/js/main.js']) ?>
  <?php echo css(['assets/css/style.css']) ?>

</head>
<body id="top" class="<?php echo $page->template() ?>" >
  <div class="container">

    <nav>
      <a href="<?php echo $site->url() ?>" class="logo">
        <img src="<?php echo $site->image($site->logomin()->value)->url() ?>" alt="" class="small">
        <img src="<?php echo $site->image($site->logomax()->value)->url() ?>" alt="" class="large">
      </a>
      <div class="text">
        <div class="pages">
          <?php foreach ($pages->visible() as $p): ?>
            <a class="<?php e($p->isOpen(), 'active') ?>" href="<?php echo $p->url() ?>">
              <span class="txt">        
                <?php echo $p->title()->html() ?>
              </span>
            </a>
          <?php endforeach ?>
          <a href="http://www.designforwellbeing.ch/upstage">
              <span class="txt">UpStage Toolkit</span>
          </a>
        </div>
        <?php if (count(Anchors::get())): ?>
          <div class="anchors">
            <?php foreach (Anchors::get() as $uid => $title): ?>
              <a href="#<?php echo $uid ?>"><?php echo $title ?></a>
            <?php endforeach ?>
              <a href="#top">
                <svg height="32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 -50 556 556" xml:space="preserve">
                <path fill="#3CB8B8" d="M309.8,178.1c0,0,41,41,66.4,66.4c10.8,10.8,28.4,10.8,39.3,0c1.8-1.8,3.6-3.6,5.4-5.4
                  c10.8-10.8,10.8-28.4,0-39.3c-33.2-33.2-99.2-99.2-122.2-122.2c-5.2-5.2-12.3-8.1-19.6-8.1c-0.8,0-1.6,0-2.4,0
                  c-7.4,0-14.4,2.9-19.6,8.1c-23,23-89,89-122.2,122.2c-10.8,10.8-10.8,28.4,0,39.3c1.8,1.8,3.6,3.6,5.4,5.4
                  c10.8,10.8,28.4,10.8,39.3,0c25.4-25.4,66.4-66.4,66.4-66.4s0,204.5,0,280.3c0,7.4,2.9,14.4,8.1,19.6c5.2,5.2,12.3,8.1,19.6,8.1
                  c2.8,0,5.6,0,8.4,0c7.4,0,14.4-2.9,19.6-8.1c5.2-5.2,8.1-12.3,8.1-19.6C309.8,382.6,309.8,178.1,309.8,178.1L309.8,178.1z"/>
                </svg>
              </a>
          </div>
        <?php endif ?>
      </div>
      <button class="hamburger">
        <span>toggle menu</span>
        <svg width="10" height="10" viewBox="0 0 10 10" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 3.5 L8 3.5" stroke-width="0.5" stroke-linecap="round" stroke="black" />
          <path d="M2 5 L8 5" stroke-width="0.5" stroke-linecap="round" stroke="black" />
          <path d="M2 6.5 L8 6.5" stroke-width="0.5" stroke-linecap="round" stroke="black" />
        </svg>
      </button>
      <div class="mobilemenu">
        <?php foreach ($pages->visible() as $p): ?>
          <a class="<?php e($p->isOpen(), 'active') ?>" href="<?php echo $p->url() ?>">
            <span class="txt">        
              <?php echo $p->title()->html() ?>
            </span>
          </a>
        <?php endforeach ?>
        <a href="http://www.designforwellbeing.ch/upstage">
          <span class="txt">UpStage Toolkit</span>
        </a>  
      </div>
    </nav>