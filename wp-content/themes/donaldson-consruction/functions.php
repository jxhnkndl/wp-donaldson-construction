<?php
  $version = wp_get_theme()->get( 'Version' );

  // Install theme support
  function dc_install_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array( 'page', 'post' ));
    add_theme_support( 'html5', array( 'script', 'style' ));
    add_theme_support( 'custom-background', array( 'default-color' => 'f2ece5') );
  }

  add_action( 'after_setup_theme', 'dc_install_theme_support' );


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
  function dc_enqueue_scripts() {
    wp_enqueue_script(
      'dc-gsap-animation',
      'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',
      array(),
      '3.12.5',
      true
    );

    wp_enqueue_script(
      'dc-gsap-animation-scrolltrigger',
      'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js',
      array(),
      '3.12.5',
      true
    );

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
      'dc-main-nav',
      get_template_directory_uri() . '/assets/js/main-nav.js',
      array(),
      $version,
      true
    );
    
    wp_enqueue_script(
      'dc-help-block-scroll-animations',
      get_template_directory_uri() . '/assets/js/help-block-scroll-animations.js',
      array(),
      $version,
      true
    );

    if ( is_page( 'home' ) ) {
      wp_enqueue_script(
        'dc-home-scroll-animations',
        get_template_directory_uri() . '/assets/js/home-scroll-animations.js',
        array(),
        $version,
        true
      );

      wp_enqueue_script(
        'dc-hero-slider',
        get_template_directory_uri() . '/assets/js/hero-slider.js',
        array(),
        $version,
        true
      );
    }

    if ( is_page( array( 'home', 'about' ) ) ) {
      wp_enqueue_script(
        'dc-testimonials-slider',
        get_template_directory_uri() . '/assets/js/testimonials-slider.js',
        array(),
        $version,
        true
      );
    }

    if ( is_single( 'project' ) ) {
      wp_enqueue_script(
        'dc-project-lightbox',
        get_template_directory_uri() . '/assets/js/image-gallery-lightbox.js',
        array(),
        $version,
        true
      );
    }

    if ( is_page( 'contact' ) ) {
      wp_enqueue_script(
        'dc-contact-form-validation',
        get_template_directory_uri() . '/assets/js/contact-form-validation.js',
        array(),
        $version,
        true
      );
    }
  }

  add_action( 'wp_enqueue_scripts', 'dc_enqueue_scripts' );


  function submit_contact_form_data() {
    if ( isset( $POST[ 'action' ] ) && $_POST[ 'action' ] == 'submit_contact_form_data' ) {
      $name = sanitize_text_field( $_POST[ 'name' ] );
      $email = sanitize_email( $_POST[ 'email' ] );
      $address = sanitize_text_field( $_POST[ 'address '] );
      $city = sanitize_text_field( $_POST[ 'city' ] );
      $state = sanitize_text_field( $_POST[ 'state' ] );
      $zip = sanitize_text_field( $_POST[ 'zip' ] );
      $message = sanitize_textarea_field( $_POST[ 'message' ] );

      $to = 'jkroyston@gmail.com';
      $subject = 'New contact form submission!';
      $message = 'Test';

      wp_mail( $to, $subject, $message );
    }

    function generate_email_body( $name, $email, $address, $city, $state, $zip, $message ) {
      echo 'Name: ' . $name;
      echo 'Email: ' . $email;
      echo 'Address: ' . $address . ', ' . $city . ' ' . $state . ', ' . $zip;
      echo 'Message: ' . $message;
    }
  } 

  add_action( 'admin_post_nopriv_submit_wp_contact_form', 'submit_contact_form_data' );
  add_action( 'admin_post_submit_wp_contact_form', 'submit_contact_form_data' );
?>