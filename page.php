<?php get_header(); ?>
<?php get_template_part('template-parts/pages-header');
?>

<section class="custom-page" id="page">

  <?php if (have_posts()) : while (have_posts()) : the_post() ?>

        <div class="custom-page__content">
            <?php the_content(); ?>
        </div>

  <?php endwhile;
  endif; ?>
  </div>

  <?php get_footer(); ?>