<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php
  function get_page_meta_description()
  {
    $custom_field_meta_description = get_post_meta(get_the_ID(), 'meta_description_field', true);
    if ($custom_field_meta_description != '') {
      return $custom_field_meta_description;
    } elseif (is_single()) {
      return get_the_title();
    } elseif (is_page()) {
      return get_the_title();
    } else {
      return get_bloginfo('description');
    }
  }
  ?>
  <meta name="description" content="<?php echo get_page_meta_description(); ?>">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
  <title><?php wp_title(); ?></title>
  <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
  <div class="brand">
    <a href="<?php echo get_home_url(); ?>">
      <?php echo get_bloginfo('name'); ?>
    </a>
  </div>
  <?php get_template_part('template-parts/navigation'); ?>