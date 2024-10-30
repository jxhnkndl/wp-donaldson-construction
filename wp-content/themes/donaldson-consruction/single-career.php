<?php /* Template Name: Project */ ?>
<?php get_header(); ?>

<?php 
  // Hero image
  $hero_image = get_field( 'hero_image' );

  // Career posting fields
  $job_title = get_field( 'job_title' );
  $job_location = get_field( 'job_location' );
  $job_description = get_field( 'job_description' );
?>

<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/career-hero.jpg'; ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <!-- Project overview -->
  <section class="content-section project-details-section">
    <div class="content-container">
      <?php if ( $job_title ) : ?>
        <h1 class="job-title"><?php echo esc_html( $job_title ); ?></h1>
      <?php endif; ?>
      <?php if ( $job_location ) : ?>
        <p class="job-location"><i class="fa-solid fa-location-dot job-location-icon"></i><?php echo esc_html( $job_location ) ?></p>
      <?php endif; ?>
      <?php if ( $job_description ) : ?>
        <div class="job-details">
          <?php echo wp_kses_post( $job_description ); ?>
        </div>
      <?php endif; ?>
      <div class="application-instructions">
        <h2>How To Apply</h2>
        <p>To apply for this position, please follow these instructions:</p>
        <ul>
          <li>Click the <strong>Apply</strong> button below to open up a new message in your email client</li>
          <li>Briefly introduce yourself and include the job title of the role you'd like to apply for in the message body</li>
          <li>Attach your cover letter and resume to the email for consideration</li>
          <li>One of our team members will review your submission and contact you regarding next steps if it seems like a good fit</li>
        </ul>
      </div>
      <div class="apply-btn-container">
        <a class="btn btn-dark" href="#">Apply</a>
      </div>
      <div class="back-link-container">
        <a href="<?php echo site_url('/careers') ?>" class="back-link">
          <i class="fa-solid fa-chevron-left"></i>
          Back to Careers
        </a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>