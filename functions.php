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
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('category-thumbnails');
}
add_action('after_setup_theme', 'theme_features');

// CUSTOM POST TYPES
function custom_post_types()
{
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
    'menu_icon' => 'dashicons-images-alt'
  ));

  register_post_type('works', array(
    'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
    'public' => true,
    'has_archive' => true,
    'labels' => array(
      'name' => 'Works',
      'add_new_item' => 'Add new Work',
      'edit_item' => 'Edit Work',
      'all_items' => 'All Works',
      'singular_name' => 'Work'
    ),
    'menu_icon' => 'dashicons-portfolio'
  ));

  register_taxonomy_for_object_type('category', 'home-banner');
  register_taxonomy_for_object_type('category', 'works');
  register_taxonomy_for_object_type('post_tag', 'works');
}
add_action('init', 'custom_post_types');

function add_categories_and_tags_to_queries($query)
{
  if (is_category() && $query->is_main_query() && !is_admin()) {
    $post_type = get_query_var('post_type');
    if ($post_type) {
      $post_type = $post_type;
    } else {
      $post_type = array('nav_menu_item', 'post', 'works');
    }
    $query->set('post_type', $post_type);
    // $query->set('orderby', 'title');
    // $query->set('order', 'desc');
    return $query;
  }
}
add_filter('pre_get_posts', 'add_categories_and_tags_to_queries');

function custom_add_image_sizes()
{
  add_image_size('sm', 576, 9999);
  add_image_size('md', 768, 9999);
  add_image_size('lg', 992, 9999);
  add_image_size('xl', 1200, 9999);
  add_image_size('full', 9999, 900);
}
add_action('after_setup_theme', 'custom_add_image_sizes');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
  if (is_archive() || is_search() || is_home()) {
    $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
  } else {
    $attr['sizes'] = '100vw';
  }

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3);
