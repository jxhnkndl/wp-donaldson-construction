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


  // Install theme support
  function dc_install_theme_support() {
    add_theme_support( 'title-tag' );
  }

  add_action( 'after_setup_theme', 'dc_install_theme_support' );

  
  // Enqueue styles
  function dc_enqueue_styles() {
    wp_enqueue_style(
      'dc-custom-styles',
      get_template_directory_uri() . "/assets/css/style.css",
      array(),
      $version,
      'all'
    );
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_styles' );


  // Enqueue scripts
  function dc_enqueue_scripts() {
    wp_enqueue_script(
      'dc-hero-slider',
      get_template_directory_uri() . '/assets/js/hero-slider.js',
      array(),
      $version,
      true
    );
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_scripts' );


  // Register custom post tyes
  function dc_register_custom_post_types() {
    register_post_type('project', array(
      'labels' => array(
        'name' => 'Projects',
        'singular_name' => 'project',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view_item' => 'View Project',
        'not_found' => 'No Projects Found',
        'all_items' => 'All Projects',
        'archives' => 'Project Archives'
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array( 'slug', 'projects' ),
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
    ));
  }

  add_action( 'init', 'dc_register_custom_post_types' );
?>