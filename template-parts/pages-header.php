<?php
$thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$pagename = get_query_var('pagename');  
if ( !$pagename && $id > 0 ) {  
    $post = $wp_query->get_queried_object();  
    $pagename = $post->post_name;  
}
?>                  
<header class="header__main">
    <div class="header__main--arrow">
        <a href="#works">
            <i class="arrow down"></i>
        </a>
    </div>
    <div class="header__main--title">
    <h1><?php echo $pagename; ?></h1>
    </div>
    <div class="header__main--img" style="background: url('<?php echo $thumbnail ?>')">
    </div>
</header>
