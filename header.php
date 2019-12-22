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
  <nav class="nav-main">
    <ul class="nav-main__brand">
      <li>
        <a href="<?php echo get_bloginfo('wpurl'); ?>">
          <?php echo get_bloginfo('name'); ?>
        </a>
      </li>
    </ul>
    <ul class="nav-main__nav">
      <li><a href="/about">Sobre</a></li>
      <li><a href="/works">Works</a></li>
    </ul>
  </nav>
