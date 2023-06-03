<?php get_header(); ?>

<main id="qualification" class="container">
  <section class="qualification">
    <h2 class="h2" style="text-align: center; margin-top: 2.5rem; margin-bottom: 2.5rem">Программы повышения квалификации</h2>
    <?php
    global $wp_query;

    $wp_query = new WP_Query(array(
      'post_type'      => 'courses',
      'tax_query' => array(
        array(
          'taxonomy' => 'coursescat',
          'field' => 'slug',
          'terms' => array('qualification')
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