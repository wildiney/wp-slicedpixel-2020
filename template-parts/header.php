<?php

if(is_category()){
    $banner = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'home-banner',
        'category_name'=>single_term_title('',false)
    ));
} elseif(is_front_page()){
    $banner = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'home-banner',
        'category_name'=>'Home'
    ));
}

while ($banner->have_posts()) : $banner->the_post();
    $bannerImage = get_the_post_thumbnail_url();
endwhile;
wp_reset_query();
?>
<section class="header">
    <div class="header__brand"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></div>
    <div class="header__lead">
        <h1><?php
            if (is_archive()) {
                echo single_term_title();
            } elseif (is_category()) {
                echo single_term_title();
            } else {
                echo bloginfo('description');
            } ?></h1>
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
    <div class="header__image" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.85) 15%, rgba(0, 0, 0, 0.85) 15%, rgba(0, 0, 0, 0.2) 100%), url('<?php echo $bannerImage; ?>');"></div>

</section>