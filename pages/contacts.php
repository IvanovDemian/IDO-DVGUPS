<?php get_header(); ?>

<main id="contacts" class="container">
  <div class="main-info">
    <h2 class="h2">Институт Дополнительного Образования</h2>
    <a href="https://yandex.ru/maps/-/CCUnn6cHDD" target="_blank">г. Хабаровск, ул. Серышева, 47 Учебный корпус № 2 (Вход со стороны улицы Яшина)</a>
    <div class="contacts-card-info__item">
      <span class="contacts-card-info__description">Режим работы</span>
      <span>пн-пт, 8:00-17:00 <br> обед 12:00-13:00</ы>
    </div>
  </div>
  <section class="contacts">
    <div class="contacts-card">
      <h3 class="h3">Приёмная</h3>
      <div class="contacts-card-info">
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Кабинет</span>
          <span>3133</span>
        </div>
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Телефон</span>
          <a href="tel:+7(4212)407-181">+7 (4212) 407-181</a>
        </div>
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Email</span>
          <a href="mailto:ipk-dvgups@mail.ru">ipk@festu.khv.ru</a>
        </div>
      </div>
    </div>
    <div class="contacts-card">
      <h3 class="h3">Директор</h3>
      <div class="contacts-card-info">
        <div class="contacts-card-info__item" style="justify-content: center;">
          <span>к.т.н. Атеняев Александр Валерьевич</span>
        </div>
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Кабинет</span>
          <span>3133</span>
        </div>
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Телефон</span>
          <a href="tel:+7(4212)407-365">+7 (4212) 407-365</a>
        </div>
        <div class="contacts-card-info__item">
          <span class="contacts-card-info__description">Email</span>
          <a href="mailto:ido@festu.khv.ru">ido@festu.khv.ru</a>
        </div>
      </div>
    </div>

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
        <a href="<?php echo get_permalink(); ?>" class="h3"><?php echo get_the_title(); ?></a>
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
    
  </section>
</main>

<?php get_footer(); ?>