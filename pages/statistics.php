<?php get_header(); ?>

<main id="statistics" class="container">
  <section class="statistics">
    <h2 class="h2">Итоги работы Института Дополнительного образования</h2>
    <div class="swiper statistics-swiper">
      <div class="swiper-wrapper">
        <?php
        $img_gallery = get_field('statistics_gallery');
        if ($img_gallery) {
          foreach ($img_gallery as $img) {
        ?>
            <div class="swiper-slide">
              <img src="<?php echo $img['sizes']['large']; ?>" alt="">
              <div class="year"><?php echo $img['title']; ?></div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
</main>

<?php get_footer(); ?>