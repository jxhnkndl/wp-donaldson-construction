<?php 
  $heading = get_field( 'help_block_heading', 'option' );
  $body = get_field( 'help_block_body', 'option' );
  $button_text = get_field( 'help_block_button_text', 'option' );
  $image = get_field( 'help_block_image', 'option' );
?>

<section class="help-block-wide">
  <div class="bg-image" style="background-image: url(<?php echo $image[ 'url' ]; ?>); ">
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