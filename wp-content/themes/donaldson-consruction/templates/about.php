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
    'post_type' => 'testimonial',
  );

  $testimonials_query = new WP_Query( $testimonials_args );
?>


<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <!-- Company overview -->
  <section class="content-section company-overview-section">
    <div class="content-container">
      <?php if ( $company_overview_heading ) : ?>
        <h1><?php echo esc_html( $company_overview_heading ); ?></h1>
      <?php endif; ?>
      <div class="company-overview-grid">
        <?php if ( $company_overview ) :?>
          <div class="company-overview-body">
            <p><?php echo esc_html( $company_overview ); ?></p>
          </div>
        <?php endif; ?>
        <?php if ( $company_overiew_image ) : ?>
          <div class="company-overview-image">
            <img src="<?php echo esc_url( $company_overiew_image[ 'url' ] ); ?>" alt="<?php echo esc_attr( $company_overiew_image[ 'alt' ] ); ?>" />
          </div>
        <?php endif; ?>
      </div>
      <?php if ( $company_overview_button_label ) : ?>
        <a class="btn btn-dark" href="<?php echo site_url( '/careers' ); ?>">
          <?php echo esc_html( $company_overview_button_label ) ?>
        </a>
      <?php endif; ?>
    </div>
  </section>

  <!-- Brand Block -->
  <?php if ( $brand_block ) : ?>
    <section class="brand-block-section">
      <div class="brand-image" style="background-image: url(<?php echo esc_url( $brand_image[ 'url' ] ) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
      <div class="blueprint-bg">
        <div class="overlay overlay-secondary">
          <h2 class="brand-block-heading home-brand-block-heading-secondary"><?php echo esc_html( $brand_heading ) ?></h2>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- Testimonials Block -->
  <section class="content-section testimonials-section">
    <div class="content-container">
      <?php if ( $testimonials_heading ) : ?>
        <h2 class="testimonials-heading-light"><?php echo $testimonials_heading; ?></h2>
      <?php endif; ?>
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
</main>

<?php get_footer(); ?>