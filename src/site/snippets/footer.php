
    <footer>
      <div class="text">
        <?php echo $site->footertext()->kt() ?>
      </div>
      <div class="logos">

        <?php foreach ($site->logos()->toStructure() as $logo): ?>
          <a href="<?php echo $logo->website()->html() ?>">
            <img src="<?php echo $site->image($logo->logo())->url() ?>" alt="">
          </a>
        <?php endforeach ?>
      </div>
    </footer>
  </div>
</body>
</html>