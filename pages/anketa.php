<?php get_header(); ?>

<main id="anketa" class="container">
  <section class="anketa">
    <h2 class="h2"><?php echo get_the_title(); ?></h2>
    <div class="content">
      <?php the_field('anketa_iframe') ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>