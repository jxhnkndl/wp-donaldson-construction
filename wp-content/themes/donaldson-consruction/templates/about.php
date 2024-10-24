<?php /* Template Name: About */ ?>
<?php get_header(); ?>

<?php 
  // Hero image
  $hero_image = get_field( 'hero_image' );

  // Company overview
  $company_overview_heading = get_field( 'company_overview_heading' );
  $company_overview = get_field( 'company_overview' );
  $company_overiew_image = get_field( 'company_overview_image' );
  $company_overview_button_label = get_field( 'company_overview_button_label' );

  // Brand block
  $brand_block = get_field( 'brand_block_group');
  $brand_heading = $brand_block[ 'brand_statement' ];
  $brand_image = $brand_block[ 'brand_image' ];

  // Testimonials section
  $testimonials_heading = get_field( 'testimonials_heading' );
  
  $testimonials_args = array(
    'post_type'         => 'testimonial',
  );

  $testimonials_query = new WP_Query( $testimonials_args );
?>


<main>
  <?php echo $brand_block; ?>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <!-- Company overview -->
  <div class="content-section company-overview-section">
    <div class="content-container">
      <h1><?php echo esc_html( $company_overview_heading ); ?></h1>
      <div class="company-overview-grid">
        <div class="company-overview-body">
          <p><?php echo $company_overview; ?></p>
        </div>
        <div class="company-overview-image">
          <img src="<?php echo esc_url( $company_overiew_image[ 'url' ] ); ?>" alt="<?php echo esc_attr( $company_overiew_image[ 'alt' ] ); ?>" />
        </div>
      </div>
      <div class="btn btn-dark"><?php echo esc_html( $company_overview_button_label ) ?></div>
    </div>
  </div>

  <!-- Brand Block -->
  <section class="brand-block-section">
    <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_image[ 'url' ] ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    <div class="blueprint-bg">
      <div class="overlay overlay-secondary">
        <h2 class="brand-block-heading home-brand-block-heading-secondary"><?php echo esc_html( $brand_heading ) ?></h2>
      </div>
    </div>
  </section>

  <!-- Testimonials Block -->
  <section class="testimonials-section testimonials-section-dark" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/contact-hero.jpg'; ?>);">
    <div class="testimonials-dark-overlay">
      <div class="content-section-flush">
        <div class="content-container">
          <h2 class="testimonials-heading-light"><?php echo $testimonials_heading; ?></h2>
          <div class="testimonials-slider">
            <?php 
              if ( $testimonials_query->have_posts() ) :
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                  $name = get_field( 'name' );
                  $job_title = get_field( 'job_title' );
                  $company = get_field( 'company' );
                  $testimonial_body = get_field( 'testimonial_body' );
                  $testimonial_excerpt = get_field( 'testimonial_excerpt' );

                  echo '<div class="testimonial-slide testimonial-slide-dark">';
                  echo '<div class="testimonial-content">';

                  echo '<div class="quote-icon-container">';
                  echo '<img src="' . get_template_directory_uri() . '/assets/images/icon-quote-secondary.png' . '" />';
                  echo '</div>';

                  echo '<div class="testimonial-header">';
                  echo '<p class="testimonial-author">' . $name . '</p>';
                  echo '<p class="testimonial-company">' . $job_title . ', ' . $company . '</p>';
                  echo '<div class="testimonial-divider testimonial-divider-secondary"></div>';
                  echo '</div>';


                  echo '<p class="testimonial-body testimonial-body-full">"' . $testimonial_body . '"</p>';
                  echo '<p class="testimonial-body testimonial-body-mobile">"' . $testimonial_excerpt . '"</p>';

                  echo '</div>';
                  echo '</div>';
                endwhile;
              endif;
            ?>
          </div>      
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>