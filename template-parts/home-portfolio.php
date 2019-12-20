<div id="portfolio">
  <div class="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <div class="item">
          <div class="card-image">
            <?php
            if (has_post_thumbnail()) { ?>
              <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail(array(500, 350)); ?>
              </a>
            <?php } ?>
          </div>
          <div class="card-text">
            <?php the_title('<h2>', '</h2>'); ?>
            <p>Categoria: <?php the_category(', '); ?></p>
            <p><?php the_tags(); ?></p>
            <p><?php the_excerpt(); ?>
          </div>
        </div>
    <?php

      endwhile;
    else :
      _e('Nothing found');
    endif;
    ?>
  </div>
</div>