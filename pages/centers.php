<?php get_header(); ?>

<main id="centers" class="container">
  <section class="centers">
    <h2 class="h2">Наши центры</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'post_type' => 'centres',
        'posts_per_page' => -1,
        'category'    => -3,
        'orderby' => 'date',
        'order' => 'ASC',
        'include' => array(),
        'exclude' => array(),
        'meta_key' => '',
        'meta_value' => '',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $img_gallery = get_field('gallery');

      ?>
        <div class="contacts-card">
          <a style="color: #7986CB;" href="<?php echo get_permalink(); ?>" class="h3"><?php echo get_the_title(); ?></a>
          <div class="contacts-card-info">
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Кабинет</span>
              <span><?php the_field('place'); ?></span>
            </div>
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Телефон</span>
              <a href="tel:<?php the_field('tel_1'); ?>"><?php the_field('tel_1'); ?></a>
            </div>
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Email</span>
              <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
            </div>
          </div>
        </div>
      <?php
      }

      wp_reset_postdata(); // сброс
      ?>
      
    </div>
  </section>
</main>

<?php get_footer(); ?>