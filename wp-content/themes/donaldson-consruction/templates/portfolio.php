<?php /* Template Name: Porfolio */ ?>
<?php get_header(); ?>

<?php
  // Hero image
  $hero_image = get_field( 'hero_image' );

  // Portfolio overview
  $portfolio_heading = get_field( 'portfolio_page_heading' );
  $portfolio_description = get_field( 'portfolio_page_description' );

  // Projects query
  $projects_args = array(
    'post_type' => 'project',
    'orderby' => 'order',
    'order' => 'ASC'
  );

  $projects_query = new WP_Query( $projects_args );
?>

<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <!-- Portfolio overview -->
  <section class="content-section portfolio-section">
    <div class="content-container">
      <h1><?php echo esc_html( $portfolio_heading ); ?></h1>
      <p><?php echo wp_kses_post( $portfolio_description ); ?></p>
    </div>
  </section>

  <!-- Project gallery -->
  <section class="content-section">
    <div class="content-container">
      <div class="project-gallery-grid">
        <?php 
          if ( $projects_query->have_posts() ) :
            while ( $projects_query->have_posts() ) : $projects_query->the_post();
              $project_image = get_field( 'thumbnail_image' );
              $project_title = get_field( 'project_title' );
              $project_description = get_field( 'short_project_description');

              echo '<a href="" class="project-card">';
              echo '<div>';
              
              echo '<div class="project-image">';
              echo '<img src="' . esc_url( $project_image[ 'url' ] ) . '" alt="' . esc_attr( $project_image[ 'alt' ] ) . '" />';
              echo '</div>';

              echo '<h2>' . esc_html( $project_title ) . '</h2>';
              echo '<p>' . wp_kses_post( $project_description ) . '</p>';

              echo '</div>';
              echo '</a>';

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