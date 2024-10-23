<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <!-- Navbar -->
    <div class="navbar">
      <div class="menu-container" aria-expanded="false">
        <div class="menu-icon">
          <div class="menu-bar menu-bar-top"></div>
          <div class="menu-bar menu-bar-bottom"></div>
        </div>
      </div>
      <div class="logo-container">
        <a href="<?php echo get_home_url(); ?>" aria-label="Visit home page">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/dc-brandmark.png'; ?>" />
        </a>
      </div>
    </div>

    <!-- Nav drawer -->
    <nav class="nav-drawer nav-hide">
      <div class="nav-links-container">
        <?php 
          wp_nav_menu(
            array(
              'menu'            => 'Main Top Nav',
              'container'       => '',
              'theme_location'  => 'Primary Top Navbar Menu',
              'items_wrap'      => '<ul class="nav-links-list">%3$s</ul>',
            )
          );
        ?>
      </div>
      <div class="nav-info-container">
        <p>
          <span>Donaldson Construction</span> is a commercial construction company servicing Central Virginia.
        </p>
        <div class="nav-icons-container">
          <a href="<?php echo esc_url( $facebook_url ); ?>">
            <i class="social-icon fa-brands fa-facebook"></i>
          </a>
          <a href="<?php echo esc_url( $instagram_url ); ?>">
            <i class="social-icon fa-brands fa-instagram"></i>
          </a>
        </div>
      </div>
    </nav>
  </header>

  <div class="opacity-overlay"></div>