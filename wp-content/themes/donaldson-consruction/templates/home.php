<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

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
  <section>
    
  </section>

</main>

<?php get_footer(); ?>