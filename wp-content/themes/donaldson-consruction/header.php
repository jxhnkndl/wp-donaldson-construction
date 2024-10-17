<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="navbar">
      <div class="menu-container">
        <div class="menu-icon">
          <div class="menu-bar menu-bar-top"></div>
          <div class="menu-bar menu-bar-bottom"></div>
        </div>
      </div>
      <div class="logo-container">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/dc-brandmark.png'; ?>" />
      </div>
    </div>
  </header>