<?php
update_option('siteurl', 'http://localhost:8300');
update_option('home', 'http://localhost:8300');

add_filter('show_admin_bar', '__return_false');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
