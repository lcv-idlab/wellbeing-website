
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

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
   
    ga('create', 'UA-101038933-1', 'auto');
    ga('send', 'pageview');
   
  </script>

</body>
</html>