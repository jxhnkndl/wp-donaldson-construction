<?php
  $version = wp_get_theme()->get( 'Version' );

  // Remove default Wordpress fields to make room for advanced custom fields
  function dc_remove_default_fields() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'project', 'editor' );
    remove_post_type_support( 'team-member', 'editor' );
    remove_post_type_support( 'testimonial', 'editor' );
  }

  add_action( 'init', 'dc_remove_default_fields' );


  // Install theme support
  function dc_install_theme_support() {
    add_theme_support( 'title-tag' );
  }

  add_action( 'after_setup_theme', 'dc_install_theme_support' );

  
  // Enqueue styles
  function dc_enqueue_styles() {
    wp_enqueue_style(
      'dc-custom-styles',
      get_template_directory_uri() . "/style.css",
      array(),
      $version,
      'all'
    );
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_styles' );
?>