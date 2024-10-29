<?php /* Template Name: Project */ ?>
<?php get_header(); ?>

<?php 
  // Hero image
  $hero_image = get_field( 'hero_image' );

  // Project details
  $project_title = get_field ( 'project_title' );
  $project_location = get_field( 'location' );
  $project_description = get_field( 'project_description' );
?>

<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>

  <!-- Project overview -->
  <section class="content-section project-details-section">
    <div class="content-container">
      <h1><?php echo esc_html( $project_title ); ?></h1>
      <div class="location-container">
        <i class="fa-solid fa-location-dot location-icon"></i>
        <p class="project-location-text"><?php echo $project_location; ?></p>
      </div>
      <p><?php echo wp_kses_post( $project_description ); ?></p>
      <div class="project-divider"></div>
    </div>
  </section>

  <!-- Image gallery -->
  <section class="content-section image-gallery">
    <div class="content-container">
      <div class="project-details-grid">
        <?php
          if ( have_rows( 'image_gallery' ) ) :
            while ( have_rows( 'image_gallery' ) ) : the_row();
              $image = get_sub_field( 'gallery_image' );
              $image_url = $image[ 'url' ];
              $image_alt_text = $image[ 'alt' ];

              echo '<a href="" class="gallery-image-link">';
              echo '<div class="gallery-image-container">';
              
              echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" class="gallery_image" />';
              
              echo '</div>';
              echo '</a>';
            endwhile;
          endif;
        ?>
      </div>
      <a href="<?php echo site_url('/portfolio') ?>" class="back-link">
        <i class="fa-solid fa-chevron-left"></i>
        Back to Portfolio
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>