<?php get_header(); ?>

<main id="content">

  <div class="container">
    <?php
    $posts = new WP_Query(array('category_name' => 'Destaque'));
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

      <?php

      endwhile;
    else : ?>
      <h2>Ainda não existem posts disponíveis</h2>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>