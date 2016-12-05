<header class="banner no-side-padding full-height">
  <div class="position--fixed main-nav">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
      <div class="site-name">
        <?php bloginfo('name'); ?><span>.com</span>
        <div class="hand-left">
          <div class="finger"></div>
          <div class="finger"></div>
          <div class="finger"></div>
        </div>
        <div class="hand-right">
          <div class="finger"></div>
          <div class="finger"></div>
          <div class="finger"></div>
        </div>
      </div> 
      <div class="face">
        <div class="eye-l"></div>
        <div class="eye-r"></div>
        <div class="mouth"></div>
      </div>
    </a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
