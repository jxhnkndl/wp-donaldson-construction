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
  
  $featured_project_args = array(
    'post_type'         => 'project',
    'posts_per_page'    => 2,
    'metaquery'         => array(
      'key'             => 'featured_project',
      'value'           => '1'
    )
  );

  $featured_projects_query = new WP_Query( $featured_project_args );

  // Brand block bottom
  $brand_block_bottom = get_field( 'brand_block_bottom' );
  $brand_block_bottom_heading = $brand_block_bottom[ 'brand_statement' ];
  $brand_block_bottom_image = $brand_block_bottom[ 'brand_image' ][ 'url' ];
  
  // Testimonials section
  $testimonials_heading = get_field( 'testimonials_heading' );

  $testimonials_args = array(
    'post_type'         => 'testimonial',
  );

  $testimonials_query = new WP_Query( $testimonials_args );

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
    <section class="content-section mission-statement-section">
      <div class="content-container">
        <h1><?php echo esc_html( $main_heading ); ?></h1>
        <p class="mission-statement"><?php echo esc_html( $mission_statement ); ?></p>
        <a class="btn btn-dark" href="<?php echo site_url( '/about' ); ?>">
          <?php echo esc_html( $cta_button_label ) ?>
        </a>
      </div>
    </section>
    
    <!-- Brand Block -->
    <section class="brand-block-section">
      <div class="blueprint-bg">
        <div class="overlay overlay-primary">
          <h2 class="brand-block-heading home-brand-block-heading-primary"><?php echo esc_html( $brand_block_top_heading ) ?></h2>
        </div>
      </div>
      <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_block_top_image ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    </section>

    <!-- Featured Projects -->
    <section class="content-section featured-projects-section">
      <div class="content-container">
        <h2><?php echo esc_html( $featured_projects_heading ); ?></h2>
        <div class="featured-projects-container">
          <?php 
            if ( $featured_projects_query->have_posts() ) :
              while ( $featured_projects_query->have_posts() ) : $featured_projects_query->the_post();
                $thumbnail_img = get_field( 'thumbnail_image' );
                $project_title = get_field( 'project_title' );
                $project_description = get_field( 'short_project_description' );
                $project_link = get_permalink();

                echo '<div class="featured-project">';

                echo '<a href="' . $project_link . '" class="featured-project">';
                echo '<div class="thumbnail-image-container">';
                echo '<img src="' . $thumbnail_img[ 'url' ] . '" alt="Donaldson Construction project" />';
                echo '</div>';
                echo '</a>';

                echo '<a href="' . $project_link . '" class="featured-project">';
                echo '<h3 class="project-title">' . $project_title . '</h3>';
                echo '</a>';
                
                echo '<p>' . $project_description . '</p>';

                echo '</div>';
              endwhile;
            endif;
          ?>
        </div>
        <a class="btn btn-dark" href="<?php echo site_url( '/portfolio' ); ?>">
          <?php echo esc_html( $featured_projects_button_label ) ?>
        </a>
    </section>

    <!-- Brand Block -->
    <section class="brand-block-section">
      <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_block_bottom_image ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
      <div class="blueprint-bg">
        <div class="overlay overlay-secondary">
          <h2 class="brand-block-heading home-brand-block-heading-secondary"><?php echo esc_html( $brand_block_bottom_heading ) ?></h2>
        </div>
      </div>
    </section>

    <!-- Testimonials Block -->
    <section class="content-section testimonials-section">
      <div class="content-container">
        <h2><?php echo $testimonials_heading; ?></h2>
        <div class="testimonials-slider">
          <?php 
            if ( $testimonials_query->have_posts() ) :
              while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                $name = get_field( 'name' );
                $job_title = get_field( 'job_title' );
                $company = get_field( 'company' );
                $testimonial_body = get_field( 'testimonial_body' );
                $testimonial_excerpt = get_field( 'testimonial_excerpt' );

                echo '<div class="testimonial-slide">';
                echo '<div class="testimonial-content">';

                echo '<div class="quote-icon-container">';
                echo '<img src="' . get_template_directory_uri() . '/assets/images/icon-quote.png' . '" />';
                echo '</div>';

                echo '<div class="testimonial-header">';
                echo '<p class="testimonial-author">' . $name . '</p>';
                echo '<p class="testimonial-company">' . $job_title . ', ' . $company . '</p>';
                echo '</div>';

                echo '<div class="testimonial-divider"></div>';

                echo '<p class="testimonial-body testimonial-body-full">"' . $testimonial_body . '"</p>';
                echo '<p class="testimonial-body testimonial-body-mobile">"' . $testimonial_excerpt . '"</p>';

                echo '</div>';
                echo '</div>';
              endwhile;
            endif;
          ?>
        </div>      
      </div>
    </section>

    <!-- Help Block -->
    <?php get_template_part( 'template-parts/help-block' ) ?>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>