<?php  
  $richmond_phone = get_field( 'richmond_phone_number', 'option' );
  $charlottesville_phone = get_field( 'charlottesville_phone_number', 'option' );
  $email_address = get_field( 'email_address', 'option' );
  $facebook_url = get_field ( 'facebook_url', 'option' );
  $instagram_url = get_field( 'instagram_url', 'option' );
?> 
  
  <footer>
    <div class="content-container">
      <div class="footer-grid">
        <div class="footer-cell footer-links">
          <h4 class="footer-column-heading">Navigate</h4>
          <?php
            wp_nav_menu(
              array(
                'menu' => 'Footer Menu',
                'container' => '',
                'theme_location' => 'Footer Menu Items',
                'items_wrap' => '<ul class="footer-nav-items">%3$s</ul>'
              )
            );
          ?>
        </div>
        <div class="footer-cell footer-contact">
          <h4 class="footer-column-heading">Contact</h4>
          <ul class="footer-nav-items">
            <li class="contact-item">
              <a href="tel:<?php echo esc_attr( $charlottesville_phone ); ?>">
                <i class="contact-icon fa-solid fa-phone"></i>
                Charlottesville
              </a>
            </li>
            <li class="contact-item">
              <a href="tel:<?php echo esc_attr( $richmond_phone ); ?>">
                <i class="contact-icon fa-solid fa-phone"></i>
                Richmond
              </a>
            </li>
            <li class="contact-item">
              <a href="mailto:<?php echo esc_url( $email_address ); ?>">
              <i class="contact-icon fa-solid fa-envelope"></i>
                Email Us
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-cell footer-notices">
          <h4 class="footer-column-heading">Notices</h4>
          <ul class="footer-nav-items">
            <li>Copyright &copy; 2024</li>
            <li>Donaldson Construction LLC</li>
            <li>All Rights Reserved</li>
            <li>Built by J.K. Royston</li>
          </ul>
        </div>
        <div class="footer-cell footer-connect">
          <h4 class="footer-column-heading">Connect</h4>
          <div class="social-icons">
            <a href="<?php echo esc_url( $facebook_url ); ?>">
              <i class="social-icon fa-brands fa-facebook"></i>
            </a>
            <a href="<?php echo esc_url( $instagram_url ); ?>">
              <i class="social-icon fa-brands fa-instagram"></i>
            </a>
            <a href="mailto:<?php echo esc_url( $email_address ); ?>">
              <i class="social-icon fa-solid fa-envelope"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>