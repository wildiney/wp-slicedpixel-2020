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
    <div class="header__lead">
        <h1><?php echo bloginfo('description'); ?></h1>
    </div>
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