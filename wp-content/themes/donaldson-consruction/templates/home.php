<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php 
  // Main content section
  $main_heading = get_field( 'main_heading' );
  $mission_statement = get_field( 'mission_statement' );
  $cta_button_label = get_field( 'cta_button_label' );
  
  // Brand block top
  $brand_block_top = get_field( 'brand_block_top' );
  $brand_block_top_heading = $brand_block_top[ 'brand_statement' ];
  $brand_block_top_image = $brand_block_top[ 'brand_image' ][ 'url' ];
  
  // Featured projcts section
  $featured_projects_heading = get_field( 'featured_projects_heading' );
  $featured_projects_button_label = get_field( 'featured_projects_button_label' );
  
  $args = array(
    'post_type'         => 'project',
    'posts_per_page'    => 2,
    'metaquery'         => array(
      'key'             => 'featured_project',
      'value'           => '1'
    )
  );

  $featured_projects_query = new WP_Query( $args );

  // Brand block bottom
  $brand_block_bottom = get_field( 'brand_block_bottom' );
  $brand_block_bottom_heading = $brand_block_bottom[ 'brand_statement' ];
  $brand_block_bottom_image = $brand_block_bottom[ 'brand_image' ][ 'url' ];
  
  // Testimonials section
  $testimonials_heading = get_field( 'testimonials_heading' );

?>

<main>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
      <div class="featured-projects-container">
        <?php 
          if ( $featured_projects_query->have_posts() ) :
            while ( $featured_projects_query->have_posts() ) : $featured_projects_query->the_post();
              $thumbnail_img = get_field( 'thumbnail_image' );
              $project_title = get_field( 'project_title' );
              $project_description = get_field( 'short_project_description' );

              echo '<div class="featured-project">';
                echo '<div class="thumbnail-image-container">';
                  echo '<img src="' . $thumbnail_img[ 'url' ] . '" alt="Donaldson Construction project" />';
                echo '</div>';
                echo '<h3 class="project-title">' . $project_title . '</h3>';
                echo '<p>' . $project_description . '</p>';
              echo '</div>';
            endwhile;
          endif;
        ?>
      </div>
      <div class="btn btn-dark"><?php echo esc_html( $featured_projects_button_label ) ?></div>
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
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>