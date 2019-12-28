<?php

// Site Name
echo bloginfo('name');

// Tagline
echo bloginfo('description');

// Loop
while (have_posts()) {
  the_title();
  the_permalink();
  the_post();
  the_content();
  the_author_posts_link();
  the_time('F');
  get_the_category_list(', ');
}

// Layout itens
get_header();
get_footer();

// Head functions
wp_head();


// Functions
wp_enqueue_style('main_style', get_stylesheet_uri());
wp_enqueue_script('main_script', get_theme_file_uri('/js/scripts.js'), null, '1.0', true);

// Detect parent pages
$parentPage = wp_get_post_parent_id(get_the_ID());
if ($parentPage) {
  echo get_the_title($parentPage);
  echo get_permalink($parentPage);
  echo "child page";
}
//Detect child pages
if($parentPage){
  $findChildrenOf = $parentPage
} else {
  $findChildrenOf = get_the_ID();
}
wp_list_pages(array(
  'title_li'=> null,
  'child_of'=>$findChildrenOf,
  'sort_column'=>'menu_order'
));

// navigation menus

// place on function
register_nav_menu('header-menu', 'Header Menu');

// place on template
wp_nav_menu(
  array(
    'menu_class' => "navigation__list",
    'theme_location' => 'header-menu',
  )
);


// pagination
echo paginate_links();


// archive.php

if(is_category()){
  single_cat_title();
}
if(is_author()){
  the_author();
}
// better
the_archive_title();
the_archive_description();