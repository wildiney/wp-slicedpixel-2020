<?php get_header(); ?>
<?php get_template_part('template-parts/header'); ?>
<section class="works" id="works">
  <?php
  $works = new WP_Query(array(
    'posts_per_page' => 5,
    'post_type' => 'Works'
  ));

  while ($works->have_posts()) : $works->the_post(); ?>
    <div class="work">
      <div class="work__thumbnail">
        <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" /></a>
      </div>
      <div class="work__content">
        <a href="<?php the_permalink() ?>">
          <h2 class="work__title"><?php echo get_the_title(); ?></h2>
        </a>
        <?php //echo wp_trim_words(get_the_content(), 200) 
        ?>
        <?php the_excerpt(); ?>
        <p><a class="btn mt-2" href="<?php the_permalink(); ?>">visualizar projeto</a></p>
      </div>
    </div>
  <?php endwhile; ?>
</section>

<?php get_footer(); ?>