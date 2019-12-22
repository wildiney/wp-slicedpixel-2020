<?php get_header(); ?>
<?php get_template_part('template-parts/home-header'); ?>

<main>
  <section id="page">
    <div class="container">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_title("<h2>", "</h2>"); ?>
          <header id="single-post">
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail('large');
            } ?>
          </header>
          <p><?php the_tags() ?><p>
              <?php the_content(); ?>
          <?php endwhile;
      endif;
          ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>