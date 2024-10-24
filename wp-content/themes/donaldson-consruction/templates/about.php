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
  $brand_block = get_field( 'brand_block_group ');
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
  <?php echo 'hi'; ?>
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
</main>

<?php get_footer(); ?>