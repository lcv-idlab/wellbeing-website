<?php ob_start(); ?>
  <?php echo $page->modules() ?>
<?php $content = ob_get_clean() ?>

<?php snippet('header') ?>

<?php echo $content; ?>

<?php snippet('footer') ?>