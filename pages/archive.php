<?php get_header(); ?>

<main id="archive" class="container">
  <section class="archive">
    <h2 class="h2">Архив занятий</h2>
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
        'post_type' => 'lessons',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ));

      global $post;

      foreach ($my_posts as $post) {
        setup_postdata($post);
        $img_gallery = get_field('lesson_img');

      ?>
        <div class="timetable-card">
          <div class="timetable-card-top">
            <div class="headline">
              <img src="<?php echo get_field('lesson_img'); ?>" alt="">
              <h3 class="h3"><?php echo get_the_title(); ?></h3>
            </div>
            <button class="button">Записаться</button>
          </div>
          <div class="timetable-card-divider"></div>
          <div class="timetable-card-bottom">
            <div class="timetable-card-parameters">
              <div class="timetable-card-parameters__column">
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.3334 9.66676V7.66302C11.3334 7.54336 11.3334 7.48356 11.3152 7.43069C11.299 7.38402 11.2728 7.34149 11.2382 7.30616C11.1991 7.26622 11.1456 7.23949 11.0386 7.18602L8.00004 5.66673M2.66671 6.3334V10.8712C2.66671 11.1191 2.66671 11.243 2.70539 11.3516C2.73958 11.4476 2.79531 11.5344 2.86829 11.6055C2.95085 11.6858 3.06355 11.7375 3.28894 11.8408L7.55564 13.7964C7.71911 13.8713 7.80084 13.9088 7.88597 13.9236C7.96144 13.9366 8.03864 13.9366 8.11411 13.9236C8.19924 13.9088 8.28097 13.8713 8.44444 13.7964L12.7111 11.8408C12.9365 11.7375 13.0492 11.6858 13.1318 11.6055C13.2048 11.5344 13.2605 11.4476 13.2947 11.3516C13.3334 11.243 13.3334 11.1191 13.3334 10.8712V6.3334M1.33337 5.66673L7.76151 2.45266C7.84897 2.40893 7.89271 2.38706 7.93857 2.37846C7.97917 2.37084 8.02091 2.37084 8.06151 2.37846C8.10737 2.38706 8.15111 2.40893 8.23857 2.45266L14.6667 5.66673L8.23857 8.88082C8.15111 8.92456 8.10737 8.94642 8.06151 8.95502C8.02091 8.96262 7.97917 8.96262 7.93857 8.95502C7.89271 8.94642 7.84897 8.92456 7.76151 8.88082L1.33337 5.66673Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo get_field('lesson_form'); ?> обучение</span>
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
                  <span><?php echo get_field('lesson_hours'); ?> часов</span>
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
                  <span><?php echo get_field('lesson_price'); ?> ₽</span>
                </div>
                <div class="timetable-card-parameters__item">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.4118 6.66664H2.11768M10.2746 1.33331V3.99998M5.25493 1.33331V3.99998M5.88238 10.6667L7.13728 12L9.96078 8.99998M5.12944 14.6667H10.4C11.4542 14.6667 11.9813 14.6667 12.384 14.4487C12.7382 14.2569 13.0262 13.951 13.2066 13.5747C13.4118 13.1468 13.4118 12.5868 13.4118 11.4667V5.86665C13.4118 4.74654 13.4118 4.18649 13.2066 3.75867C13.0262 3.38234 12.7382 3.07638 12.384 2.88463C11.9813 2.66665 11.4542 2.66665 10.4 2.66665H5.12944C4.07522 2.66665 3.54811 2.66665 3.14546 2.88463C2.79127 3.07638 2.5033 3.38234 2.32284 3.75867C2.11768 4.18649 2.11768 4.74654 2.11768 5.86665V11.4667C2.11768 12.5868 2.11768 13.1468 2.32284 13.5747C2.5033 13.951 2.79127 14.2569 3.14546 14.4487C3.54811 14.6667 4.07522 14.6667 5.12944 14.6667Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <span><?php echo get_field('lesson_date'); ?></span>
                </div>
              </div>
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