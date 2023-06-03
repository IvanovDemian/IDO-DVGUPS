<?php get_header(); ?>

<main class="container">
  <section class="home">
    <div class="heading">
      <h1 class="h1">Институт Дополнительного Образования</h1>
      <h3 class="h3 mobile-hidden">Дальневосточный Государственный Университет Путей Сообщения</h3>
      <h3 class="h3 desktop-hidden">ДВГУПС</h3>
    </div>
    <div class="programs-categories ">
      <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=qualification&order=&" class="categories-card">
        <div class="content">
          <h3 class="h3">Программы повышения квалификации</h3>
          <p>Повышение уровня знаний и навыков специалистов, позволяющее отвечать требованиям профессии.</p>
        </div>
        <img src="http://ido-dvgups.ru/wp-content/uploads/ido-slider-1.png" alt="">
      </a>
      <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=additional&order=&" class="categories-card">
        <div class="content">
          <h3 class="h3">Дополнительные общеобразовательные программы</h3>
          <p>Образование, направленное на удовлетворение потребностей самосовершенствования.</p>
        </div>
        <img src="http://ido-dvgups.ru/wp-content/uploads/ido-slider-2.png" alt="">
      </a>
      <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=retraining&order=&" class="categories-card" class="categories-card">
        <div class="content">
          <h3 class="h3">Программы профессиональной переподготовки</h3>
          <p>Образование, позволяющее освоить и получить новую специальность (профессию).</p>
        </div>
        <img src="http://ido-dvgups.ru/wp-content/uploads/ido-slider-3.png" alt="">
      </a>
    </div>
    <div class="swiper banner mw-900">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="content">
            <h2 class="h2">Повышение квалификации</h2>
            <p>Повышение уровня знаний и навыков специалистов, позволяющее отвечать требованиям профессии.</p>
            <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=qualification&order=&" class="button">Перейти к курсам</a>
          </div>
          <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-1.png" class="swiper-slide-bg">
          <div class="banner-img mobile-hidden">
            <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-1.png" alt="">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="content">
            <h2 class="h2">Дополнительные общеобразовательные программы</h2>
            <p>Образование, направленное на удовлетворение потребностей самосовершенствования.</p>
            <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=additional&order=&" class="button">Перейти к курсам</a>
          </div>
          <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-2.png" class="swiper-slide-bg">
          <div class="banner-img mobile-hidden">
            <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-2.png" alt="">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="content">
            <h2 class="h2">Профессиональная переподготовка</h2>
            <p>Образование, позволяющее освоить и получить новую специальность (профессию).</p>
            <a href="<?php echo get_home_url(); ?>/programs/catalog?search=&category=retraining&order=&" class="button">Перейти к курсам</a>
          </div>
          <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-3.png" class="swiper-slide-bg">
          <div class="banner-img mobile-hidden">
            <img src="http://ido-dvgups.ru/wp-content/uploads/2022/12/ido-slide-3.png" alt="">
          </div>
        </div>
      </div>
      <div class="swiper-button-next mobile-hidden"></div>
      <div class="swiper-button-prev mobile-hidden"></div>
    </div>
  </section>
  <section class="events">
    <h2 class="h2">Анонсы мероприятий</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'events',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $select = get_field('event_select');
      ?>
        <?php if ($select == 'Новая программа') { ?>
          <div class="events-card program">
            <div class="events-card-headline">
              <h3 class="h3"><?php echo get_the_title(); ?></h3>
              <p><?php echo get_field('event_course-cat'); ?></p>
            </div>
            <div class="events-card-parameters">
              <div class="events-card-parameters__item" data-event="price">
                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_629_210)">
                    <path d="M10.6251 10.6251C12.9069 10.3197 14.6667 8.36534 14.6667 6.00001C14.6667 3.42268 12.5773 1.33334 10 1.33334C7.63467 1.33334 5.68033 3.09312 5.37485 5.37486M5 8.66668L6 8.00001V11.6667M5 11.6667H7M10.6667 10C10.6667 12.5773 8.57733 14.6667 6 14.6667C3.42267 14.6667 1.33333 12.5773 1.33333 10C1.33333 7.42268 3.42267 5.33334 6 5.33334C8.57733 5.33334 10.6667 7.42268 10.6667 10Z" stroke="#7986CB" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                  </g>
                  <defs>
                    <clipPath id="clip0_629_210">
                      <rect width="16" height="16" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
                <?php if (get_field('event_check-price') == 'Стоимость') { ?>
                  <span><?php echo get_field('event_price1'); ?> ₽</span>
                <?php } else if (get_field('event_check-price') == 'Предложение') { ?>
                  <span><?php echo get_field('event_price2'); ?></span>
                <?php } ?>
              </div>
              <div class="contact-parameters">
                <div class="events-card-parameters__item" data-event="tel">
                  <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.58685 5.90214C6.05084 6.86852 6.6834 7.77432 7.4844 8.57539C8.28546 9.37639 9.19126 10.0089 10.1577 10.4729C10.2408 10.5129 10.2823 10.5328 10.3349 10.5481C10.5219 10.6027 10.7513 10.5635 10.9096 10.4501C10.9542 10.4183 10.9923 10.3801 11.0685 10.3039C11.3015 10.0709 11.4181 9.95432 11.5353 9.87812C11.9772 9.59079 12.5469 9.59079 12.9889 9.87812C13.1061 9.95432 13.2226 10.0709 13.4557 10.3039L13.5855 10.4339C13.9399 10.7881 14.117 10.9653 14.2132 11.1555C14.4046 11.5339 14.4046 11.9808 14.2132 12.3591C14.117 12.5494 13.9399 12.7265 13.5855 13.0809L13.4805 13.1859C13.1274 13.539 12.9509 13.7155 12.7108 13.8504C12.4445 14 12.0308 14.1076 11.7253 14.1067C11.4501 14.1059 11.2619 14.0525 10.8856 13.9457C8.86333 13.3717 6.95506 12.2887 5.3631 10.6967C3.77112 9.10472 2.68814 7.19646 2.11416 5.1742C2.00735 4.7979 1.95394 4.60975 1.95313 4.33446C1.95222 4.02897 2.05979 3.61531 2.2094 3.34898C2.34424 3.10896 2.52078 2.93241 2.87386 2.57933L2.97895 2.47424C3.33324 2.11994 3.5104 1.9428 3.70065 1.84657C4.07902 1.65519 4.52586 1.65519 4.90424 1.84657C5.09449 1.9428 5.27164 2.11994 5.62594 2.47424L5.75585 2.60416C5.98892 2.83722 6.10546 2.95376 6.18164 3.07094C6.46898 3.51287 6.46898 4.08259 6.18164 4.52452C6.10546 4.6417 5.98892 4.75824 5.75585 4.99131C5.67964 5.06752 5.64154 5.10562 5.60964 5.15016C5.4963 5.30845 5.45717 5.53796 5.51165 5.72486C5.52698 5.77746 5.54694 5.81902 5.58685 5.90214Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo get_field('event_phone'); ?></span>
                </div>
                <div class="events-card-parameters__item" data-event="email">
                  <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.3333 12L9.90473 7.99999M6.09524 7.99999L1.66669 12M1.33333 4.66666L6.7766 8.47692C7.2174 8.78552 7.4378 8.93979 7.67753 8.99952C7.88927 9.05232 8.11073 9.05232 8.32246 8.99952C8.5622 8.93979 8.7826 8.78552 9.2234 8.47692L14.6667 4.66666M4.53333 13.3333H11.4667C12.5868 13.3333 13.1468 13.3333 13.5747 13.1153C13.951 12.9236 14.2569 12.6177 14.4487 12.2413C14.6667 11.8135 14.6667 11.2535 14.6667 10.1333V5.86666C14.6667 4.74655 14.6667 4.1865 14.4487 3.75868C14.2569 3.38235 13.951 3.07639 13.5747 2.88464C13.1468 2.66666 12.5868 2.66666 11.4667 2.66666H4.53333C3.41323 2.66666 2.85317 2.66666 2.42535 2.88464C2.04903 3.07639 1.74307 3.38235 1.55132 3.75868C1.33333 4.1865 1.33333 4.74655 1.33333 5.86666V10.1333C1.33333 11.2535 1.33333 11.8135 1.55132 12.2413C1.74307 12.6177 2.04903 12.9236 2.42535 13.1153C2.85317 13.3333 3.41323 13.3333 4.53333 13.3333Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo get_field('event_email'); ?></span>
                </div>
              </div>

            </div>
          </div>
        <?php } else if ($select == 'Разовое мероприятие') { ?>
          <div class="events-card event">
            <div class="events-card-headline">
              <h3 class="h3"><?php echo get_the_title(); ?></h3>
              <p><?php echo get_field('event_course-cat'); ?></p>
            </div>
            <div class="events-card-parameters">
              <div class="events-card-parameters__item">
                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 6.66667H2M10.6667 1.33334V4.00001M5.33333 1.33334V4.00001M6 10.6667L7.33333 12L10.3333 9.00001M5.2 14.6667H10.8C11.9201 14.6667 12.4801 14.6667 12.908 14.4487C13.2843 14.2569 13.5903 13.951 13.782 13.5747C14 13.1468 14 12.5868 14 11.4667V5.86668C14 4.74657 14 4.18652 13.782 3.7587C13.5903 3.38237 13.2843 3.07641 12.908 2.88466C12.4801 2.66668 11.9201 2.66668 10.8 2.66668H5.2C4.07989 2.66668 3.51984 2.66668 3.09202 2.88466C2.71569 3.07641 2.40973 3.38237 2.21799 3.7587C2 4.18652 2 4.74657 2 5.86668V11.4667C2 12.5868 2 13.1468 2.21799 13.5747C2.40973 13.951 2.71569 14.2569 3.09202 14.4487C3.51984 14.6667 4.07989 14.6667 5.2 14.6667Z" stroke="#7986CB" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>15.08 — 19.08</span>
              </div>
              <div class="events-card-parameters__item">
                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_629_210)">
                    <path d="M10.6251 10.6251C12.9069 10.3197 14.6667 8.36534 14.6667 6.00001C14.6667 3.42268 12.5773 1.33334 10 1.33334C7.63467 1.33334 5.68033 3.09312 5.37485 5.37486M5 8.66668L6 8.00001V11.6667M5 11.6667H7M10.6667 10C10.6667 12.5773 8.57733 14.6667 6 14.6667C3.42267 14.6667 1.33333 12.5773 1.33333 10C1.33333 7.42268 3.42267 5.33334 6 5.33334C8.57733 5.33334 10.6667 7.42268 10.6667 10Z" stroke="#7986CB" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                  </g>
                  <defs>
                    <clipPath id="clip0_629_210">
                      <rect width="16" height="16" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
                <span>35000 ₽</span>
              </div>
              <div class="events-card-parameters__item">
                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.58685 5.90214C6.05084 6.86852 6.6834 7.77432 7.4844 8.57539C8.28546 9.37639 9.19126 10.0089 10.1577 10.4729C10.2408 10.5129 10.2823 10.5328 10.3349 10.5481C10.5219 10.6027 10.7513 10.5635 10.9096 10.4501C10.9542 10.4183 10.9923 10.3801 11.0685 10.3039C11.3015 10.0709 11.4181 9.95432 11.5353 9.87812C11.9772 9.59079 12.5469 9.59079 12.9889 9.87812C13.1061 9.95432 13.2226 10.0709 13.4557 10.3039L13.5855 10.4339C13.9399 10.7881 14.117 10.9653 14.2132 11.1555C14.4046 11.5339 14.4046 11.9808 14.2132 12.3591C14.117 12.5494 13.9399 12.7265 13.5855 13.0809L13.4805 13.1859C13.1274 13.539 12.9509 13.7155 12.7108 13.8504C12.4445 14 12.0308 14.1076 11.7253 14.1067C11.4501 14.1059 11.2619 14.0525 10.8856 13.9457C8.86333 13.3717 6.95506 12.2887 5.3631 10.6967C3.77112 9.10472 2.68814 7.19646 2.11416 5.1742C2.00735 4.7979 1.95394 4.60975 1.95313 4.33446C1.95222 4.02897 2.05979 3.61531 2.2094 3.34898C2.34424 3.10896 2.52078 2.93241 2.87386 2.57933L2.97895 2.47424C3.33324 2.11994 3.5104 1.9428 3.70065 1.84657C4.07902 1.65519 4.52586 1.65519 4.90424 1.84657C5.09449 1.9428 5.27164 2.11994 5.62594 2.47424L5.75585 2.60416C5.98892 2.83722 6.10546 2.95376 6.18164 3.07094C6.46898 3.51287 6.46898 4.08259 6.18164 4.52452C6.10546 4.6417 5.98892 4.75824 5.75585 4.99131C5.67964 5.06752 5.64154 5.10562 5.60964 5.15016C5.4963 5.30845 5.45717 5.53796 5.51165 5.72486C5.52698 5.77746 5.54694 5.81902 5.58685 5.90214Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>+7 (4212) 407-316</span>
              </div>
              <div class="events-card-parameters__item">
                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.3333 12L9.90473 7.99999M6.09524 7.99999L1.66669 12M1.33333 4.66666L6.7766 8.47692C7.2174 8.78552 7.4378 8.93979 7.67753 8.99952C7.88927 9.05232 8.11073 9.05232 8.32246 8.99952C8.5622 8.93979 8.7826 8.78552 9.2234 8.47692L14.6667 4.66666M4.53333 13.3333H11.4667C12.5868 13.3333 13.1468 13.3333 13.5747 13.1153C13.951 12.9236 14.2569 12.6177 14.4487 12.2413C14.6667 11.8135 14.6667 11.2535 14.6667 10.1333V5.86666C14.6667 4.74655 14.6667 4.1865 14.4487 3.75868C14.2569 3.38235 13.951 3.07639 13.5747 2.88464C13.1468 2.66666 12.5868 2.66666 11.4667 2.66666H4.53333C3.41323 2.66666 2.85317 2.66666 2.42535 2.88464C2.04903 3.07639 1.74307 3.38235 1.55132 3.75868C1.33333 4.1865 1.33333 4.74655 1.33333 5.86666V10.1333C1.33333 11.2535 1.33333 11.8135 1.55132 12.2413C1.74307 12.6177 2.04903 12.9236 2.42535 13.1153C2.85317 13.3333 3.41323 13.3333 4.53333 13.3333Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>ipk-dvgups@mail.ru</span>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php
      }

      wp_reset_postdata(); // сброс
      ?>
    </div>

    <button class="button desktop-hidden more" data-card="events-card" onclick="showMore(this)">Показать ещё</button>
  </section>
  <section class="timetable">
    <h2 class="h2">Начало ближайших курсов</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'lessons',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $lesson_date = get_field('lesson_date');

        $post_title = get_the_title();
        $post_form = get_field('lesson_form');
        $post_hours = get_field('lesson_hours');
        $post_price = get_field('lesson_price');
        $checkbox = get_field('lesson_checkbox');

        $course = get_field('lesson_course');
        $post = $course;
        setup_postdata($post);
        if ($checkbox && $course) :
          $post_title = get_the_title();
          $post_form = get_field('course_form');
          $post_hours = get_field('course_hours');
          $post_price = get_field('course_price');
        endif; ?>
        <div class="timetable-card" data-check="<?php echo $checkbox ?>">
          <div class="timetable-card-top">
            <div class="headline">
              <h3 class="h3"><?php echo $post_title ?></h3>
            </div>
            <a href="<?php echo get_permalink(); ?>" class="button">Записаться</a>
          </div>
          <div class="timetable-card-divider"></div>
          <div class="timetable-card-bottom">
            <div class="timetable-card-parameters">
              <div class="timetable-card-parameters__column">
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.3334 9.66676V7.66302C11.3334 7.54336 11.3334 7.48356 11.3152 7.43069C11.299 7.38402 11.2728 7.34149 11.2382 7.30616C11.1991 7.26622 11.1456 7.23949 11.0386 7.18602L8.00004 5.66673M2.66671 6.3334V10.8712C2.66671 11.1191 2.66671 11.243 2.70539 11.3516C2.73958 11.4476 2.79531 11.5344 2.86829 11.6055C2.95085 11.6858 3.06355 11.7375 3.28894 11.8408L7.55564 13.7964C7.71911 13.8713 7.80084 13.9088 7.88597 13.9236C7.96144 13.9366 8.03864 13.9366 8.11411 13.9236C8.19924 13.9088 8.28097 13.8713 8.44444 13.7964L12.7111 11.8408C12.9365 11.7375 13.0492 11.6858 13.1318 11.6055C13.2048 11.5344 13.2605 11.4476 13.2947 11.3516C13.3334 11.243 13.3334 11.1191 13.3334 10.8712V6.3334M1.33337 5.66673L7.76151 2.45266C7.84897 2.40893 7.89271 2.38706 7.93857 2.37846C7.97917 2.37084 8.02091 2.37084 8.06151 2.37846C8.10737 2.38706 8.15111 2.40893 8.23857 2.45266L14.6667 5.66673L8.23857 8.88082C8.15111 8.92456 8.10737 8.94642 8.06151 8.95502C8.02091 8.96262 7.97917 8.96262 7.93857 8.95502C7.89271 8.94642 7.84897 8.92456 7.76151 8.88082L1.33337 5.66673Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo $post_form ?> обучение</span>
                </div>
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_561_1385)">
                      <path d="M8.00004 3.99998V7.99998L10.6667 9.33331M14.6667 7.99998C14.6667 11.6818 11.6819 14.6666 8.00004 14.6666C4.31814 14.6666 1.33337 11.6818 1.33337 7.99998C1.33337 4.31808 4.31814 1.33331 8.00004 1.33331C11.6819 1.33331 14.6667 4.31808 14.6667 7.99998Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                      <clipPath id="clip0_561_1385">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                  <span><?php echo $post_hours ?> часов</span>
                </div>
              </div>
              <div class="timetable-card-parameters__column">
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_561_981)">
                      <path d="M10.7563 10.7563C13.1522 10.4357 15 8.38358 15 5.89999C15 3.1938 12.8061 1 10.1 1C7.61639 1 5.56434 2.84776 5.24358 5.24359M4.84999 8.69999L5.89999 7.99999V11.85M4.84999 11.85H6.94999M10.8 10.1C10.8 12.8061 8.60618 15 5.89999 15C3.1938 15 1 12.8061 1 10.1C1 7.39379 3.1938 5.19999 5.89999 5.19999C8.60618 5.19999 10.8 7.39379 10.8 10.1Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                      <clipPath id="clip0_561_981">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                  <span><?php echo $post_price ?> ₽</span>
                </div>
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.4118 6.66664H2.11768M10.2746 1.33331V3.99998M5.25493 1.33331V3.99998M5.88238 10.6667L7.13728 12L9.96078 8.99998M5.12944 14.6667H10.4C11.4542 14.6667 11.9813 14.6667 12.384 14.4487C12.7382 14.2569 13.0262 13.951 13.2066 13.5747C13.4118 13.1468 13.4118 12.5868 13.4118 11.4667V5.86665C13.4118 4.74654 13.4118 4.18649 13.2066 3.75867C13.0262 3.38234 12.7382 3.07638 12.384 2.88463C11.9813 2.66665 11.4542 2.66665 10.4 2.66665H5.12944C4.07522 2.66665 3.54811 2.66665 3.14546 2.88463C2.79127 3.07638 2.5033 3.38234 2.32284 3.75867C2.11768 4.18649 2.11768 4.74654 2.11768 5.86665V11.4667C2.11768 12.5868 2.11768 13.1468 2.32284 13.5747C2.5033 13.951 2.79127 14.2569 3.14546 14.4487C3.54811 14.6667 4.07522 14.6667 5.12944 14.6667Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo $lesson_date ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php
      }
      wp_reset_postdata(); // сброс
      ?>

    </div>
    <button class="button desktop-hidden more" data-card="timetable-card" onclick="showMore(this)">Показать ещё</button>
  </section>
  <section class="news">
    <h2 class="h2">Новости</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => 4,
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

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $img_gallery = get_field('gallery');

      ?>
        <a href="<?php echo get_permalink(); ?>" class="news-card">
          <h3 class="h3"><?php echo get_the_title(); ?></h3>
          <div class="image-wrapper" style="background: url('<?php echo $img_gallery[0]['sizes']['large']; ?>'); background-size: cover; background-position: center;">
            <!-- <img src="./img/news-image-1.png" alt="Изображение"> -->
          </div>
        </a>
      <?php
      }

      wp_reset_postdata(); // сброс
      ?>
    </div>
    <button class="button desktop-hidden more" data-card="news-card" onclick="showMore(this)">Показать ещё</button>
  </section>
  <section class="videos">
    <h2 class="h2">Видеорепортажи</h2>
    <div class="content">
      <?php
      $my_posts = get_posts(array(
        'numberposts' => 4,
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
    <button class="button desktop-hidden more" data-card="videos-card" onclick="showMore(this)">Показать ещё</button>
  </section>
  <section class="partners">
    <h2 class="h2">Наши партнёры</h2>
    <div class="swiper" id="partners-slider">
      <div class="swiper-wrapper">
        <a href="https://www.rzd.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/rzd.png" alt="РЖД">
        </a>
        <a href="https://universitetrzd.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/universitetrzd.jpg" alt="Университет РЖд">
        </a>
        <a href="https://rlw.gov.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/rlw.gov_.png" alt="Федеральное агентство железнодорожного транспорта">
        </a>
        <a href="https://novotrans.com/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/novotrans.png" alt="НОВОТРАНС">
        </a>
        <a href="https://gge.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/gge.jpg" alt="ГГЭ">
        </a>
        <a href="https://www.dvfu.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/dvfu.svg" alt="ДВФУ">
        </a>
        <a href="https://www.ranepa.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/ranepa.png" alt="РАНХиГС">
        </a>
        <a href="https://www.locotech.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/locotech.jpg" alt="ЛокоТех">
        </a>
        <a href="https://www.sberbank.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/sberbank.svg" alt="Сбербанк">
        </a>
        <a href="https://rosatom.ru/" class="swiper-slide" target="_blank">
          <img src="http://ido-dvgups.ru/wp-content/uploads/rosatom.svg" alt="РОСАТОМ">
        </a>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
</main>

<?php get_footer(); ?>