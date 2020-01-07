<?php get_header(); ?>
<?php
$banner = new WP_Query(array(
  'posts_per_page' => 1,
  'post_type' => 'home-banner'
));

while ($banner->have_posts()) : $banner->the_post();
  $bannerImage = get_the_post_thumbnail_url();
endwhile;
?>
<section class="header">
  <div class="header__image" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 15%, rgba(0, 0, 0, 0.8) 15%, rgba(0, 0, 0, 0) 100%), url('<?php echo $bannerImage; ?>');"></div>
  <div class="header__brand"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></div>
  <div class="header__lead"><?php echo bloginfo('description'); ?></div>
  <?php
  wp_nav_menu(array(
    'theme_location' => 'header-menu',
    'container' => 'nav',
    'container_class' => 'header__menu'
  ));
  ?>
  <div class="header_scroll">
    <div class="header_scroll--arrow"></div>
  </div>
</section>

<section class="works">
  <?php
  $works = new WP_Query(array(
    'posts_per_page' => 5,
    'post_type' => 'Works'
  ));

  while ($works->have_posts()) : $works->the_post(); ?>
    <div class="work">
      <div class="work__thumbnail">
        <img src="<?php the_post_thumbnail_url() ?>" width="100%" />
      </div>
      <div class="work__content">
        <h2 class="work__title"><?php echo get_the_title(); ?></h2>
        <?php //echo wp_trim_words(get_the_content(), 200) 
        ?>
        <?php the_excerpt(); ?>
        <p><a class="btn mt-2" href="<?php the_permalink(); ?>">visualizar projeto</a></p>
      </div>
    </div>
  <?php endwhile; ?>
</section>

<?php get_footer(); ?>