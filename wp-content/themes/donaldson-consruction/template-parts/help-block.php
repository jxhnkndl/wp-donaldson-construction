<?php 
  $heading = get_field( 'help_block_heading', 'option' );
  $body = get_field( 'help_block_body', 'option' );
  $button_text = get_field( 'help_block_button_text', 'option' );
  $image_wide = get_field( 'help_block_image_wide', 'option' );
  $image_tall = get_field( 'help_block_image_tall', 'option' );
?>

<section class="help-block-wide">
  <div class="bg-image" style="background-image: url(<?php echo $image_wide[ 'url' ]; ?>); ">
    <div class="bg-blur"></div>
    <div class="bg-placeholder"></div>
  </div>
  <div class="grid-overlay">
    <div class="bg-charcoal">
      <div class="help-content">
        <h3><?php echo $heading; ?></h3>
        <p><?php echo $body; ?></p>
        <a href="#" class="btn btn-secondary"><?php echo $button_text; ?></a>
      </div>
    </div>
    <div class="bg-orange"></div>
  </div>
</section>

<section class="help-block-tall">
  <div class="bg-image-tall" style="background-image: url(<?php echo $image_tall[ 'url' ]; ?>); ">
    <div class="bg-image-tall-overlay">
      <div class="bg-image-tall-blur"></div>
      <div class="bg-image-tall-content">
        <h3><?php echo esc_html( $heading ); ?></h3>
        <p><?php echo esc_html( $body ); ?></p>
        <a href="#" class="btn btn-secondary"><?php echo $button_text; ?></a>
      </div>
    </div>
  </div>
</section>