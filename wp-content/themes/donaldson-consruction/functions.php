<?php

  // Remove default Wordpress fields to make room for advanced custom fields
  function jkr_remove_default_page_fields() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'project', 'editor' );
  }

  add_action( 'init', 'jkr_remove_default_page_fields' );

?>