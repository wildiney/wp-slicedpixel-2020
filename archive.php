<?php get_header(); ?>
<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php the_title("<h2>", "</h2>"); ?>
      <?php the_category(', ') ?>
      <p><?php the_tags() ?><p>
          <?php the_content(); ?>
      <?php endwhile;
  endif;
      ?>
</div>
<?php get_footer(); ?>