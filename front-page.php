<?php get_header(); ?>
<?php get_template_part('template-parts/header'); ?>
<section class="works" id="works">
  <?php
  $works = new WP_Query(array(
    'post_type' => 'Works'
  ));

  while ($works->have_posts()) : $works->the_post(); ?>
    <div class="work">
      <div class="work__thumbnail">
        <a href="<?php the_permalink() ?>">
          <?php
          $image_id = get_post_thumbnail_id();
          $img_src = wp_get_attachment_image_url($image_id, 'xl');
          $img_srcset = wp_get_attachment_image_srcset($image_id);
          $img_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          ?>
          <img src="<?php echo esc_attr($img_src); ?>" srcset="<?php echo esc_attr($img_srcset); ?>" /></a>
      </div>
      <div class="work__content">
        <a href="<?php the_permalink() ?>">
          <h2 class="work__title"><?php echo get_the_title(); ?></h2>
        </a>

        <p class="work__categories">
          <?php the_category(' '); ?>
        </p>

        <?php the_excerpt(); ?>
        <p><a class="btn mt-2" href="<?php the_permalink(); ?>">visualizar projeto</a></p>
      </div>
    </div>
  <?php endwhile; ?>
</section>

<?php get_footer(); ?>