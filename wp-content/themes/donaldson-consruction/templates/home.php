<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php 
  $main_heading = get_field( 'main_heading' );
  $mission_statement = get_field( 'mission_statement' );
  $cta_button_label = get_field( 'cta_button_label' );
  $featured_projects_heading = get_field( 'featured_projects_heading' );
  $featured_projects_button_label = get_field( 'featured_projects_button_label' );
  $testimonials_heading = get_field( 'testimonials_heading' );
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

</main>

<?php get_footer(); ?>