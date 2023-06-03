<?php get_header(); ?>

<main id="ankety" class="container">
  <section class="ankety">
    <h2 class="h2">Анкеты Обратной связи</h2>
    <div class="content">
      <?php $query = new WP_Query([
        'post_parent' => 32,
        'post_type'   => 'page',
        'orderby'     => 'date',
        'order'       => 'ASC',
      ]); ?>
      <?php
      while ($query->have_posts()) {
        $query->the_post();
      ?>
        <a href="<?php echo get_permalink(); ?>" class="row">
          <?php the_field('anketa_svg') ?>
          <h3 class="h3"><?php echo get_the_title(); ?></h3>
        </a>
      <?php } ?>
      <?php wp_reset_query(); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>