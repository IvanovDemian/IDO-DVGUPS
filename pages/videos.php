<?php get_header(); ?>

<main id="videos" class="container">
  <section class="videos">
    <h2 class="h2">Видеорепортажи</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'include' => array(),
        'exclude' => array(),
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'videos',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;

      foreach ($my_posts as $post) {
        setup_postdata($post);
      ?>
        <a href="<?php echo get_field('video_url'); ?>" class="videos-card">
          <h3 class="h3"><?php echo get_the_title(); ?></h3>
          <div class="image-wrapper" style="background: url(''); background-size: cover; background-position: center;">
            <img class=img src="" alt="">
            <svg width="61" height="40" viewBox="0 0 61 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_570_369)">
                <path d="M21.9472 10.7237C21.2823 10.3913 20.5 10.8748 20.5 11.6181V28.3821C20.5 29.1254 21.2823 29.6089 21.9472 29.2765L38.7111 20.8945C39.4482 20.526 39.4482 19.4742 38.7111 19.1057L21.9472 10.7237Z" fill="white" />
                <path d="M50.5 0.5H10.5C5.25329 0.5 1 4.75329 1 10V30C1 35.2467 5.25329 39.5 10.5 39.5H50.5C55.7467 39.5 60 35.2467 60 30V10C60 4.75329 55.7467 0.5 50.5 0.5Z" stroke="white" stroke-width="2" />
              </g>
              <defs>
                <clipPath id="clip0_570_369">
                  <rect width="61" height="40" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </div>
        </a>
      <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>