<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post() ?>
    <section class="header">
      <div class="header__brand"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></div>
      <div class="header__lead">
        <h1><?php the_title(); ?></h1>
      </div>
      <?php if (has_post_thumbnail()) : ?>
        <div class="header__image" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.85) 15%, rgba(0, 0, 0, 0.85) 15%, rgba(0, 0, 0, 0.2) 100%), url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
      <?php endif; ?>
      <div class="menu__mobile">
        <span class="menu__mobile--lines"></span>
      </div>

      <?php
      wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => 'nav',
        'container_class' => 'header__menu showhide'
      ));
      ?>
      <div class="header__scroll">
        <a href="#works"><i class="header__scroll--arrow"></i></a>
      </div>
    </section>

    <section class="works" id="works">
      <div class="work__content">
        <?php the_content(); ?>
      </div>
    </section>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>