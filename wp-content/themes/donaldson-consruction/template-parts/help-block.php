<?php 
  $heading = get_field( 'help_block_heading', 'option' );
  $body = get_field( 'help_block_body', 'option' );
  $button_text = get_field( 'help_block_button_text', 'option' );
  $image_wide = get_field( 'help_block_image_wide', 'option' );
  $image_tall = get_field( 'help_block_image_tall', 'option' );
?>

<section class="help-block-wide">
  <div class="bg-image" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/help-block-wide.jpg'; ?>); ">
    <div class="bg-blur"></div>
    <div class="bg-placeholder"></div>
  </div>
  <div class="grid-overlay">
    <div class="bg-charcoal">
      <div class="help-content">
        <?php if ( $heading ) : ?>
          <h3><?php echo $heading; ?></h3>
        <?php endif; ?>
        <?php if ( $body ) : ?>
          <p><?php echo $body; ?></p>
        <?php endif; ?>
        <?php if ( $button_text ) : ?>
          <a class="btn btn-secondary" href=""><?php echo esc_html( $button_text ); ?></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="bg-orange"></div>
  </div>
</section>

<section class="help-block-tall">
  <div class="bg-image-tall" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/help-block-tall.jpg'; ?>); ">
    <div class="bg-image-tall-overlay">
      <div class="bg-image-tall-blur"></div>
      <div class="bg-image-tall-content">
        <?php if ( $heading ) : ?>
          <h3><?php echo esc_html( $heading ); ?></h3>
        <?php endif; ?>
        <?php if ( $body ) : ?>
          <p><?php echo esc_html( $body ); ?></p>
        <?php endif; ?>
        <?php if ( $button_text ) : ?>          
          <div class="btn btn-secondary">
            <a href=""><?php echo esc_html( $button_text ); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>