<?php get_header(); ?>
<?php get_template_part('template-parts/pages-header'); ?>

<div id="works">
  <div class="container">
    <h2>Works</h2>
    <?php
    $posts = new WP_Query(array('category_name' => 'Works'));

    if ($posts->have_posts()) :
      while ($posts->have_posts()) : $posts->the_post();
    ?>
        <div class="row mt-8 portfolio">
          <div class="col-sm-12 col-md-6">
            <div class="thumbnail">
              <?php
              if (has_post_thumbnail()) { ?>
                <a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              <?php } ?>
            </div>
          </div>

          <div class="col-sm-12 col-md-6">
            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p><?php the_tags(''); ?></p>
            <div class="home__excerpt">
              <p><?php the_excerpt(); ?>
            </div>
          </div>
        </div>



    <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
</div>
<?php get_footer(); ?>