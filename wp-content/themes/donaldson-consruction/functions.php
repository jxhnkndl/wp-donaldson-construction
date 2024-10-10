<?php

  function jkr_remove_default_page_fields() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
  }

  add_action( 'init', 'jkr_remove_default_page_fields' );

?>