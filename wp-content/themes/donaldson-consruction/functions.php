<?php
  $version = wp_get_theme()->get( 'Version' );

  // Remove default Wordpress fields to make room for advanced custom fields
  function dc_remove_default_fields() {
    remove_post_type_support( 'career', 'editor' );
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'project', 'editor' );
    remove_post_type_support( 'team-member', 'editor' );
    remove_post_type_support( 'testimonial', 'editor' );
  }

  add_action( 'init', 'dc_remove_default_fields' );


  // Register menus
  function dc_register_menus() {
    $menu_locations = array(
      'primary'     => 'Primary Top Navbar Menu',
      'footer'      => 'Footer Menu Items'
    );

    register_nav_menus( $menu_locations );
  }

  add_action( 'init', 'dc_register_menus' );


  // Install theme support
  function dc_install_theme_support() {
    add_theme_support( 'title-tag' );
  }

  add_action( 'after_setup_theme', 'dc_install_theme_support' );


  // Enqueue styles
  function dc_enqueue_styles() {
    wp_enqueue_style(
      'dc-font-awesome',
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
      array(),
      '6.6.0',
      'all'
    );

    wp_enqueue_style(
      'dc-custom-styles',
      get_template_directory_uri() . "/style.css",
      array(),
      $version,
      'all'
    );
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_styles' );


  // Enqueue Slick carousel for hero carousel on home page
  function dc_enqueue_slick_carousel() {
    wp_enqueue_script(
      'dc-slick-carousel-jquery',
      'http://code.jquery.com/jquery-1.11.0.min.js',
      array(),
      '1.11.0',
      true
    );
    
    wp_enqueue_script(
      'dc-slick-carousel-jquery-migrate',
      'http://code.jquery.com/jquery-migrate-1.2.1.min.js',
      array('dc-slick-carousel-jquery'),
      '1.2.1',
      true
    );

    wp_enqueue_script(
      'dc-slick-carousel-js',
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js',
      array(),
      '1.9.0',
      true
    );

    wp_enqueue_style(
      'dc-slick-carousel-css',
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css',
      array(),
      '1.9.0',
      'all'
    );

    wp_enqueue_style(
      'dc-slick-carousel-css-theme',
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css',
      array('dc-slick-carousel-css'),
      '1.9.0',
      'all'
    );

    wp_enqueue_script(
      'dc-hero-slider',
      get_template_directory_uri() . '/assets/js/hero-slider.js',
      array(),
      $version,
      true
    );

    wp_enqueue_script(
      'dc-testimonials-slider',
      get_template_directory_uri() . '/assets/js/testimonials-slider.js',
      array(),
      $version,
      true
    );
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_slick_carousel' );
?>