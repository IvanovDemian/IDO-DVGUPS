<?php get_header(); ?>

<main id="retraining" class="container">
  <section class="retraining">
    <h2 class="h2" style="text-align: center; margin-top: 2.5rem; margin-bottom: 2.5rem">Программы профессиональной переподготовки</h2>
    <?php
    global $wp_query;

    $wp_query = new WP_Query(array(
      'post_type'      => 'courses',
      'tax_query' => array(
        array(
          'taxonomy' => 'coursescat',
          'field' => 'slug',
          'terms' => array('retraining')
        )
      ),
      'posts_per_page' => false,
      'orderby' => 'name',
      'order' => 'ASC',
      'paged' => get_query_var('paged') ?: 1 // страница пагинации
    ));
    ?>
    <div class="courses-grid">
      <?php
      while (have_posts()) {
        the_post();
      ?>
        <?php get_template_part('template-parts/course-card'); ?>
      <?php    }    ?>
      <?php
      wp_reset_query(); // сброс $wp_query
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>