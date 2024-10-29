<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<?php 
  // Hero image
  $hero_image = get_field( 'hero_image' );

  // Contact overview
  $contact_heading = get_field( 'contact_page_heading' );
  $contact_description = get_field( 'contact_page_description' );

  // Contact options (repeater fields)
  $service_areas = get_field( 'service_areas' );
  $contact_methods = get_field( 'contact_methods' );
  $social_media_icon_links = get_field( 'social_media_icon_links' );
?>

<main>
  <!-- Hero section -->
  <div class="subpage-hero-image" style="background-image: url(<?php echo esc_url( $hero_image[ 'url' ] ); ?>); background-size: cover; background-position: top center; background-repeat: no-repeat;"></div>

  <div class="content-section contact-section">
    <div class="content-container">
      <h1><?php echo esc_html( $contact_heading ); ?></h1>
      <p><?php echo wp_strip_all_tags( $contact_description ); ?></p>
      <div class="contact-grid">
        <form>
          <div class="form-control">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="input-name" />
          </div>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" id="input-email" />
          </div>
          <div class="form-grid form-grid-top">
            <div class="form-control">
              <label for="address">Address</label>
              <input type="text" name="address" id="input-address" />
            </div>
            <div class="form-control">
              <label for="city">City</label>
              <input type="text" name="city" id="input-city" />
            </div>
          </div>
          <div class="form-grid form-grid-bottom">
            <div class="form-control">
              <label for="state">State</label>
              <input type="text" name="state" id="input-state" />
            </div>
            <div class="form-control">
              <label for="zip">Zip Code</label>
              <input type="text" name="zip" id="input-zip" />
            </div>
          </div>
          <div class="form-control">
            <label for="message">Tell us a little more about how we can help.</label>
            <textarea name="message" id="message"></textarea>
          </div>
          <button type="submit" class="btn btn-dark submit-btn">Submit</button>
        </form>
        <div class="contact-sidebar">
          SIDEBAR
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>