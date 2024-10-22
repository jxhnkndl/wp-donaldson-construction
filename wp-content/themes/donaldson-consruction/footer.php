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
                'items_wrap' => '<ul class="footer-nav-links">%3$s</ul>'
              )
            );
          ?>
        </div>
        <div class="footer-cell footer-contact">
          <h4 class="footer-column-heading">Contact</h4>
        </div>
        <div class="footer-cell footer-notices">
          <h4 class="footer-column-heading">Notices</h4>
        </div>
        <div class="footer-cell footer-connect">
          <h4 class="footer-column-heading">Connect</h4>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>