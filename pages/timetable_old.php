<?php get_header(); ?>

<main id="timetable" class="container">
  <section class="timetable">
    <h2 class="h2">Расписание занятий</h2>
    <?php
    $sliders = get_field('slider');
    if ($sliders) {
      foreach ($sliders as $slider) {
    ?>
        <div class="swiper timetable-swiper">
          <div class="swiper-wrapper">
            <?php
            $img_gallery = $slider['slider-gallery'];
            if ($img_gallery) {
              foreach ($img_gallery as $img) {
            ?>
                <div class="swiper-slide">
                  <img src="<?php echo $img['sizes']['large']; ?>" alt="">
                </div>
            <?php
              }
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
    <?php
      }
    }
    ?>
  </section>
</main>

<?php get_footer(); ?>