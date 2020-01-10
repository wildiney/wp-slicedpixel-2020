<?php
// Add Styles and Scripts on Theme
function theme_files()
{
  wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Titillium+Web&display=swap');
  wp_enqueue_style('main_style', get_stylesheet_uri(), null, '1.0');

  wp_enqueue_script('main_script', get_theme_file_uri('/js/scripts.js'), null, '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_files');

// Add the correct title on Pages
function theme_features()
{
  register_nav_menu('header-menu', 'Header Menu');
  add_theme_support('title-tag');
  #add_theme_support('custom-background');
}
add_action('after_setup_theme', 'theme_features');


// Add Menu


// Other functions
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');


// CUSTOM POST TYPES
function custom_post_types()
{
  register_post_type('works', array(
    'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
    'public' => true,
    'has_archive' => true,
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Works',
      'add_new_item' => 'Add new Work',
      'edit_item' => 'Edit Work',
      'all_items' => 'All Works',
      'singular_name' => 'Work'
    ),
    'menu_icon' => 'dashicons-portfolio'
  ));

  register_post_type('home-banner', array(
    'supports' => array('title', 'page-attributes', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Home Banner',
      'add_new_item' => 'Add new Banner',
      'edit_item' => 'Edit Banner',
      'all_items' => 'All Banners',
      'singular_name' => 'Banner'
    ),
    'menu_icon' => 'dashicons-file'
  ));

  register_taxonomy(  
    'works',  // this is the custom post type(s) I want to use this taxonomy for
    array(  
        'hierarchical' => false,  
        'label' => 'Works Category',  
        'query_var' => true,  
        'rewrite' => true  
    )
    );
}
add_action('init', 'custom_post_types');

function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('works'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}
add_filter('pre_get_posts', 'query_post_type');
