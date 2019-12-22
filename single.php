<?php get_header(); ?>
<?php get_template_part('template-parts/single-header'); ?>

<main>
  <section id="single">
    <div class="container">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_title("<h2>", "</h2>"); ?>
          
          <p><?php the_tags() ?><p>
              <?php the_content(); ?>
          <?php endwhile;
      endif;
          ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>