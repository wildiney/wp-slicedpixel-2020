  <div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon">&nbsp;</span>
    </label>
    <div class="navigation__background">&nbsp;</div>
    <nav class="navigation__nav">
      <?php
      wp_nav_menu(
        array(
          'menu_class' => "navigation__list",
          'theme_location' => 'header-menu',
        )
      ); ?>
      <!-- <ul class="navigation__list">
        <li class="navigation__item"><a href="<?php echo site_url('/about'); ?>" class="navigation__link">Sobre</a></li>
        <li class="navigation__item"><a href="<?php echo site_url('/works'); ?>" class="navigation__link">Works</a></li>
        <li class="navigation__item"><a href="" class="navigation__link">Contato</a></li>
      </ul> -->
    </nav>
  </div>