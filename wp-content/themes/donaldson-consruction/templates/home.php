<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php 
  // Main content
  $main_heading = get_field( 'main_heading' );
  $mission_statement = get_field( 'mission_statement' );
  $cta_button_label = get_field( 'cta_button_label' );
  $featured_projects_heading = get_field( 'featured_projects_heading' );
  $featured_projects_button_label = get_field( 'featured_projects_button_label' );
  $testimonials_heading = get_field( 'testimonials_heading' );

  // Brand block top
  $brand_block_top = get_field( 'brand_block_top' );
  $brand_block_top_heading = $brand_block_top[ 'brand_statement' ];
  $brand_block_top_image = $brand_block_top[ 'brand_image' ][ 'url' ];

  // Brand block bottom
  $brand_block_bottom = get_field( 'brand_block_bottom' );
  $brand_block_bottom_heading = $brand_block_bottom[ 'brand_statement' ];
  $brand_block_bottom_image = $brand_block_bottom[ 'brand_image' ][ 'url' ];
?>

<main>
  
  <!-- Hero Image Carousel -->
  <?php 
  $images = get_field( 'hero_images' ); 

  if ( $images ) {
    echo '<div class="slider">';

    foreach ( $images as $image ) {
      $currentImage = $image[ 'hero_image' ];
      echo '<div class="img-slide" style="background-image: url(' . $currentImage[ 'url' ] . '); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>';
    }

    echo '</div>';
  }
  ?>
  <!-- Mission Statement -->
  <section class="content-section">
    <div class="content-container">
      <h1><?php echo esc_html( $main_heading ); ?></h1>
      <p class="mission-statement"><?php echo esc_html( $mission_statement ); ?></p>
      <div class="btn btn-dark"><?php echo esc_html( $cta_button_label ) ?></div>
    </div>
  </section>
  <!-- Brand Block -->
  <section class="brand-block-section">
    <div class="blueprint-bg">
      <div class="overlay overlay-primary">
        <h2 class="brand-block-heading"><?php echo esc_html( $brand_block_top_heading ) ?></h2>
      </div>
    </div>
    <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_block_top_image ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
  </section>
  <!-- Featured Projects -->
  <div class="content-section">
    <div class="content-container">
      <h2><?php echo esc_html( $featured_projects_heading ); ?></h2>
    </div>
  </div>
    <!-- Brand Block -->
  <section class="brand-block-section">
    <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_block_bottom_image ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    <div class="blueprint-bg">
      <div class="overlay overlay-secondary">
        <h2 class="brand-block-heading"><?php echo esc_html( $brand_block_bottom_heading ) ?></h2>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>