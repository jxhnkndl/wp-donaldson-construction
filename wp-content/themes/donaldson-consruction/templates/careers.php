<?php /* Template Name: Careers */ ?>
<?php get_header(); ?>

<?php
  $hero_image = get_field( 'hero_image' );
  $careers_heading = get_field( 'careers_page_heading' );
  $careers_description = get_field( 'careers_field_description' );

  $careers_args = array(
    'post_type' => 'career',
  );

  $careers_query = new WP_Query( $careers_args );
?>

<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <!-- Careers overview -->
  <section class="content-section careers-overview-section">
    <div class="content-container">
      <h1><?php echo esc_html( $careers_heading ); ?></h1>
      <p><?php echo wp_strip_all_tags( $careers_description ); ?></p>
      <div class="careers">
      <?php
        if ( $careers_query->have_posts() ) :
          while ( $careers_query->have_posts() ) : $careers_query->the_post();
            $job_title = get_field( 'job_title' );
            $job_location = get_field( 'job_location' );
            $short_description = get_field( 'short_description' );
            $posting_link = get_permalink();

            echo '<a href="' . esc_url( $posting_link ) . '" class="career-posting">';
            echo '<div class="inner-career-container">';
            echo '<h2>' . esc_html( $job_title ) . '</h2>';
            echo '<p class="career-location"><i class="fa-solid fa-location-dot career-location-icon"></i>' . esc_html( $job_location ) . '</p>';
            echo '<p class="career-description">' . wp_strip_all_tags( $short_description ) . '</p>';
            echo '</div>';
            echo '</a>';
          endwhile;
        endif;
      ?>
    </div>
  </section>

  <!-- Help Block -->
  <?php get_template_part( 'template-parts/help-block' ) ?>
</main>

<?php get_footer(); ?>