<?php get_header(); ?>
<?php $current_post_id = get_the_ID(); ?>

<main id="news" class="container">
  <section class="news">
    <h2 class="h2"><?php echo get_the_title(); ?></h2>
    <div class="content">
      <div class="description">
        <?php the_field('text'); ?>
      </div>
      <?php
      $img_gallery = get_field('gallery');
      if (count($img_gallery) > 1) {
      ?>
      <div class="slider" style="height: 32rem;">
        <div class="swiper post-main-slider" style="height: 80%;">
      <?php
      } else {
        ?>
      <div class="slider" style="height: auto;">
        <div class="swiper post-main-slider" style="height: auto;">
        <?php
      }
      ?>
          <div class="swiper-wrapper">
            <?php
            $img_gallery = get_field('gallery');
            if ($img_gallery) {
              foreach ($img_gallery as $img) {
            ?>
                <div class="swiper-slide">
                  <a data-fancybox="gallery" data-src="<?php echo $img['sizes']['large']; ?>">
                    <img src="<?php echo $img['sizes']['large']; ?>"/>
                  </a>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
        <?php
          $img_gallery = get_field('gallery');
          if (count($img_gallery) > 1) {
        ?>
        <div thumbsSlider="" class="swiper post-thumbs-slider">
          <div class="swiper-wrapper">
            
              <?php foreach ($img_gallery as $img) { ?>
                <div class="swiper-slide">
                  <img src="<?php echo $img['sizes']['large']; ?>" />
                </div>
            <?php
              }
            ?>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  <section class="other-news">
    <h2 class="h2">Другие новости</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => 5,
        'orderby' => 'date',
        'order' => 'DESC',
        'include' => array(),
        'exclude' => array(),
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'news',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;
      $counter = 0;

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $post_id = get_the_ID();
        if ($post_id != $current_post_id) {
          $img_gallery = get_field('gallery');
          if ($counter < 4) {
      ?>
          <a href="<?php echo get_permalink(); ?>" class="news-card">
            <h3 class="h3"><?php echo get_the_title(); ?></h3>
            <div class="image-wrapper" style="background: url('<?php echo $img_gallery[0]['sizes']['large']; ?>'); background-size: cover; background-position: center;">
              <!-- <img src="./img/news-image-1.png" alt="Изображение"> -->
            </div>
          </a>
          <?php $counter++;?>
          
      <?php
          }
        }
      }

      wp_reset_postdata(); // сброс
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>