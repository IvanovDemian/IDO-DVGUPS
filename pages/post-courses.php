<?php get_header(); ?>

<main id="course">
  <?php $decor = get_field('course_decor');
  $course_title = get_the_title();
  ?>

  <section class="first-section">
    <?php $terms = get_the_terms(get_the_ID(), 'coursescat');

    $term_id = $terms[0]->term_taxonomy_id;
    $term_slug = $terms[0]->slug;
    $term = get_term($term_id);
    $gradient = get_field('coursecat_gradient', $term);
    ?>

    <div class="gradient" style="background: linear-gradient(90deg, <?php echo $gradient['color1']; ?> 0%, <?php echo $gradient['color2']; ?> 100%);
      "></div>
    <div class="container">
      <div class="course-title">
        <h1 class="h1"><?php echo $course_title ?></h1>
      </div>
      <?php $center = get_field('course_center'); ?>
      <div class="main-info" data-center="">
        <div class="left">
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.1954 13.6954C16.1902 13.2946 18.5 10.7295 18.5 7.62499C18.5 4.24225 15.7576 1.5 12.375 1.5C9.27049 1.5 6.70542 3.8097 6.30447 6.80449M5.81249 11.125L7.12499 10.25V15.0625M5.81249 15.0625H8.43749M13.25 12.875C13.25 16.2576 10.5077 19 7.12499 19C3.74225 19 1 16.2576 1 12.875C1 9.49224 3.74225 6.74999 7.12499 6.74999C10.5077 6.74999 13.25 9.49224 13.25 12.875Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div>
              <h3 class="h3">Стоимость</h3>
              <div><?php the_field('course_price'); ?> ₽</div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1118_809)">
                <mask id="mask0_1118_809" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                  <path d="M20 0H0V20H20V0Z" fill="white" />
                </mask>
                <g mask="url(#mask0_1118_809)">
                  <path d="M10.0003 4.99998V9.99998L13.3337 11.6666M18.3337 9.99998C18.3337 14.6023 14.6027 18.3333 10.0003 18.3333C5.39794 18.3333 1.66699 14.6023 1.66699 9.99998C1.66699 5.3976 5.39794 1.66664 10.0003 1.66664C14.6027 1.66664 18.3337 5.3976 18.3337 9.99998Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                </g>
              </g>
              <defs>
                <clipPath id="clip0_1118_809">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>
            <div>
              <h3 class="h3">Количество часов</h3>
              <?php $course_hours = get_field('course_hours'); ?>
              <div><?php echo $course_hours ?> часов</div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.2677 11.0542C18.3112 10.7089 18.3337 10.3571 18.3337 10C18.3337 5.39763 14.6027 1.66667 10.0003 1.66667C5.39795 1.66667 1.66699 5.39763 1.66699 10C1.66699 14.6023 5.39795 18.3333 10.0003 18.3333C10.3632 18.3333 10.7206 18.3102 11.0712 18.2652M10.0003 5.00001V10L13.1157 11.5577M15.8337 18.3333V13.3333M13.3337 15.8333H18.3337" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div>
              <h3 class="h3">Продолжительность обучения</h3>
              <div><?php the_field('course_duration'); ?></div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.1669 12.0834V9.57877C14.1669 9.4292 14.1669 9.35445 14.1442 9.28836C14.1241 9.23002 14.0912 9.17686 14.0479 9.1327C13.9992 9.08277 13.9322 9.04936 13.7984 8.98252L10.0003 7.08341M3.33367 7.91675V13.589C3.33367 13.8989 3.33367 14.0537 3.38202 14.1895C3.42475 14.3095 3.49442 14.418 3.58564 14.5069C3.68884 14.6072 3.82972 14.6719 4.11145 14.801L9.44483 17.2455C9.64917 17.3391 9.75133 17.386 9.85774 17.4045C9.95208 17.4207 10.0486 17.4207 10.1429 17.4045C10.2493 17.386 10.3515 17.3391 10.5558 17.2455L15.8892 14.801C16.1709 14.6719 16.3118 14.6072 16.4149 14.5069C16.5062 14.418 16.5759 14.3095 16.6187 14.1895C16.6669 14.0537 16.6669 13.8989 16.6669 13.589V7.91675M1.66699 7.08341L9.70217 3.06582C9.81149 3.01116 9.86617 2.98382 9.92349 2.97307C9.97424 2.96355 10.0264 2.96355 10.0772 2.97307C10.1345 2.98382 10.1892 3.01116 10.2985 3.06582L18.3337 7.08341L10.2985 11.101C10.1892 11.1557 10.1345 11.183 10.0772 11.1938C10.0264 11.2033 9.97424 11.2033 9.92349 11.1938C9.86617 11.183 9.81149 11.1557 9.70217 11.101L1.66699 7.08341Z" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div>
              <h3 class="h3">Форма обучения</h3>
              <?php $course_form = get_field('course_form') ?>
              <div><?php echo $course_form ?></div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.8891 12.2333C6.73577 12.2333 6.63243 12.2483 6.5791 12.2633V13.245C6.64243 13.26 6.7216 13.2642 6.83077 13.2642C7.22993 13.2642 7.47577 13.0625 7.47577 12.7217C7.47577 12.4167 7.2641 12.2333 6.8891 12.2333ZM9.79493 12.2433C9.62827 12.2433 9.51993 12.2583 9.45577 12.2733V14.4483C9.51993 14.4633 9.62327 14.4633 9.7166 14.4633C10.3974 14.4683 10.8408 14.0933 10.8408 13.3C10.8458 12.6083 10.4416 12.2433 9.79493 12.2433Z" fill="white" />
              <path d="M6.80685 13.4418C6.57437 13.4405 6.33733 13.5753 6.23301 13.7999V12.0899C6.43585 12.0716 6.63956 12.0638 6.84331 12.0667L6.84331 12.0667H6.84884C7.27238 12.0667 7.49553 12.149 7.61606 12.2452L7.61647 12.2455C7.73063 12.3363 7.82037 12.4957 7.82051 12.7012C7.81978 12.939 7.74268 13.1024 7.63975 13.2011C7.48384 13.3467 7.22 13.4417 6.83467 13.4417L6.83048 13.4417L6.80685 13.4418ZM6.80685 13.4418L6.80462 13.8418L6.80683 13.4418H6.80685ZM11.0872 14.6209C10.7372 14.9117 10.2047 15.05 9.55384 15.05C9.27034 15.05 9.04717 15.0368 8.87441 15.02C8.77464 15.0103 8.70051 14.9251 8.70051 14.8249V11.9088C8.70051 11.8095 8.77333 11.7249 8.87192 11.7131C9.15206 11.6797 9.4341 11.6641 9.71634 11.6667C10.3472 11.6667 10.7572 11.78 11.0772 12.0217L11.0872 14.6209ZM11.0872 14.6209L10.8316 14.3132C10.8311 14.3136 10.8306 14.314 10.8302 14.3144M11.0872 14.6209L10.8287 14.3156C10.8292 14.3152 10.8297 14.3148 10.8302 14.3144M10.8302 14.3144C11.0511 14.1267 11.2397 13.804 11.2397 13.275C11.2397 12.797 11.07 12.5145 10.8388 12.3429L10.8361 12.3409C10.6118 12.1715 10.3002 12.0667 9.71634 12.0667H9.71269V12.0667C9.50831 12.0648 9.304 12.0731 9.10051 12.0914M10.8302 14.3144C10.5823 14.5195 10.1595 14.65 9.55384 14.65C9.3781 14.65 9.2279 14.6447 9.10051 14.6367M9.10051 12.0914V11.9088C9.10051 12.0055 9.02834 12.0973 8.91937 12.1103C8.97967 12.1031 9.04005 12.0968 9.10051 12.0914ZM9.10051 12.0914V14.6367M9.10051 14.6367C9.03151 14.6324 8.96921 14.6273 8.91316 14.6219C9.02709 14.6329 9.10051 14.7282 9.10051 14.8249V14.6367ZM16.461 18.128L16.4611 18.128C16.8485 17.7404 17.0663 17.2148 17.0663 16.6667V6.74953C17.0663 6.5904 17.0031 6.43779 16.8906 6.32527L12.0077 1.44242C11.8952 1.3299 11.7426 1.26669 11.5835 1.26669H4.99967C4.45157 1.26669 3.92589 1.48442 3.53832 1.87199C3.15074 2.25957 2.93301 2.78524 2.93301 3.33335V16.6667C2.93301 17.2148 3.15075 17.7404 3.5383 18.128C3.92588 18.5156 4.45156 18.7334 4.99967 18.7334H14.9997C15.5478 18.7334 16.0734 18.5156 16.461 18.128ZM12.658 12.0917C12.6059 12.1457 12.5638 12.2095 12.5347 12.28V12.0917H12.658ZM12.5347 13.6508V13.0959C12.5819 13.2105 12.6636 13.3073 12.7669 13.3733C12.6636 13.4394 12.5819 13.5362 12.5347 13.6508ZM11.6663 7.10002H11.233V4.29903L14.034 7.10002H11.6663ZM10.8916 3.95761L10.8918 3.9578L10.8916 3.95761Z" fill="white" stroke="#7986CB" stroke-width="0.8" />
            </svg>
            <div class="documents">
              <h3 class="h3">Документы</h3>
              <?php $docs = get_field('course_docs'); ?>
              <div>
                <a href="<?php echo $docs['syllabus']; ?>" target="_blank">Учебный план</a>
                <a href="<?php echo $docs['frontpage']; ?>" target="_blank">Титульный лист</a>
              </div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.41667 16.6667H4.16667C3.24619 16.6667 2.5 15.9205 2.5 15V3.33332C2.5 2.41285 3.24619 1.66666 4.16667 1.66666H15.8333C16.7538 1.66666 17.5 2.41285 17.5 3.33332V15C17.5 15.9205 16.7538 16.6667 15.8333 16.6667H14.5833M10 15.8333C11.3807 15.8333 12.5 14.7141 12.5 13.3333C12.5 11.9526 11.3807 10.8333 10 10.8333C8.61925 10.8333 7.5 11.9526 7.5 13.3333C7.5 14.7141 8.61925 15.8333 10 15.8333ZM10 15.8333L10.0178 15.8332L7.35722 18.4938L5.0002 16.1367L7.51638 13.6206M10 15.8333L12.6607 18.4938L15.0177 16.1367L12.5015 13.6206M7.5 4.99999H12.5M5.83333 7.91666H14.1667" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div>
              <h3 class="h3">Выдаваемый документ</h3>
              <?php $sampledoc = get_field('course_sampledoc');
              $url   = $sampledoc['url'];
              $alt   = $sampledoc['alt'];
              $title = $sampledoc['title'];
              ?>
              <div>
                <a data-fancybox data-src="<?php echo $url ?>" data-caption="<?php echo $title ?>"><?php echo $title ?></a>
              </div>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.93281 12.0169C6.64006 12.0169 3.96094 9.32132 3.96094 6.00813C3.96094 2.69538 6.63984 0 9.93281 0C13.2271 0 15.9073 2.69538 15.9073 6.00813C15.9073 9.32154 13.2273 12.0169 9.93281 12.0169ZM9.93281 1.10462C7.24863 1.10462 5.06555 3.30418 5.06555 6.00835C5.06555 8.71253 7.24885 10.9125 9.93281 10.9125C12.6183 10.9125 14.8027 8.71231 14.8027 6.00835C14.8027 3.3044 12.6183 1.10462 9.93281 1.10462Z" fill="#7986CB" />
              <path d="M16.656 17.971C16.3509 17.971 16.1037 17.7238 16.1037 17.4187V13.1202C16.1037 11.7407 15.3443 10.7657 13.7826 10.1402C13.4993 10.0268 13.3619 9.70552 13.4753 9.42222C13.5885 9.13937 13.9098 9.00112 14.1931 9.11497C16.685 10.113 17.2083 11.8438 17.2083 13.1202V17.4189C17.2083 17.7238 16.961 17.971 16.656 17.971Z" fill="#7986CB" />
              <path d="M3.2984 17.9703C2.99335 17.9703 2.74609 17.7231 2.74609 17.418V13.1202C2.74609 11.2923 3.75708 9.90812 5.66895 9.11758C5.95093 9.00109 6.27379 9.13516 6.39027 9.4167C6.50675 9.69845 6.37291 10.0215 6.09093 10.138C4.58346 10.7613 3.85071 11.7369 3.85071 13.1202V17.4182C3.85071 17.7231 3.60346 17.9703 3.2984 17.9703Z" fill="#7986CB" />
              <path d="M9.97787 19.8862C9.85567 19.8862 9.73369 19.8457 9.63281 19.7651L7.72776 18.2413C7.566 18.1117 7.49018 17.9024 7.53171 17.6992L8.73985 11.8128C8.79259 11.5559 9.01875 11.3715 9.28073 11.3715H10.655C10.9165 11.3715 11.1425 11.555 11.1957 11.8112L12.4214 17.6976C12.4636 17.9011 12.3882 18.1112 12.2258 18.2411L10.3229 19.7649C10.2223 19.8457 10.0998 19.8862 9.97787 19.8862ZM8.6816 17.5901L9.97743 18.6268L11.2713 17.5912L10.206 12.4763H9.73128L8.6816 17.5901Z" fill="#7986CB" />
            </svg>
            <div>
              <h3 class="h3">Куратор программы</h3>
              <?php $curator = get_field('course_curator');
              $post = $curator;
              setup_postdata($post); ?>
              <div>
                <?php if (get_field('curator_degree')) : ?>
                  <span class="curator-degree"><?php the_field('curator_degree'); ?>, </span>
                <?php endif; ?>
                <span><?php echo get_the_title(); ?></span>
                <?php if (get_field('curator_position')) : ?>
                  <p class="curator-position"><?php the_field('curator_position'); ?></p>
                <?php endif; ?>

              </div>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <div class="main-info__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1507_1239)">
                <path d="M10 1C5.02995 1 1 5.02995 1 10C1 14.9701 5.02995 19 10 19C14.9701 19 19 14.9701 19 10C19 5.02995 14.9701 1 10 1Z" stroke="#7986CB" stroke-miterlimit="10" />
                <path d="M9 8.59375H10.25V13.125" stroke="#7986CB" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.125 13.2812H11.5625" stroke="#7986CB" stroke-miterlimit="10" stroke-linecap="round" />
                <path d="M10.0156 5.07812C9.81475 5.07812 9.61839 5.13769 9.45137 5.24929C9.28436 5.36089 9.15418 5.51951 9.07731 5.70509C9.00044 5.89067 8.98033 6.09488 9.01952 6.29189C9.0587 6.4889 9.15543 6.66987 9.29747 6.81191C9.43951 6.95394 9.62048 7.05067 9.81749 7.08986C10.0145 7.12905 10.2187 7.10894 10.4043 7.03207C10.5899 6.9552 10.7485 6.82502 10.8601 6.658C10.9717 6.49098 11.0313 6.29462 11.0313 6.09375C11.0313 5.82439 10.9242 5.56606 10.7338 5.37559C10.5433 5.18513 10.285 5.07812 10.0156 5.07812Z" fill="#7986CB" />
              </g>
              <defs>
                <clipPath id="clip0_1507_1239">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>
            <div>
              <h3 class="h3">Контактная информация</h3>
              <?php
              $post = $center;
              setup_postdata($post);
              ?>
              <a href="<?php the_permalink(); ?>" class="center-title" target="_blank">
                <span><?php echo get_the_title(); ?></span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1512_1239)">
                    <path d="M5.60019 2.8V4.2H2.1002V11.9H9.80019V8.4H11.2002V12.6C11.2002 12.9866 10.8868 13.3 10.5002 13.3H1.4002C1.0136 13.3 0.700195 12.9866 0.700195 12.6V3.5C0.700195 3.1134 1.0136 2.8 1.4002 2.8H5.60019ZM13.3002 0.699997V7L10.6444 4.3449L6.44516 8.54497L5.45522 7.55503L9.65459 3.3551L7.0002 0.699997H13.3002Z" fill="#7986CB" />
                  </g>
                  <defs>
                    <clipPath id="clip0_1512_1239">
                      <rect width="14" height="14" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </a>
              <div class="center-contacts">
                <?php if (get_field('email')) : ?>
                  <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                <?php endif; ?>
                <?php if (get_field('tel_1')) : ?>
                  <a href="tel:<?php the_field('tel_1'); ?>"><?php the_field('tel_1'); ?></a>
                <?php endif; ?>
                <!-- <span style="color: var(--divider);">·</span> -->
                <?php if (get_field('tel_2')) : ?>
                  <a href="tel:<?php the_field('tel_2'); ?>"><?php the_field('tel_2'); ?></a>
                <?php endif; ?>
              </div>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
        <?php
        $post = $center;
        setup_postdata($post);
        $center_slug = $post->post_name;
        ?>
        <div class="right crm-right" style="display: flex;" data-center="<?php echo $center_slug ?>" data-title="<?php echo $course_title ?>" data-hours="<?php echo $course_hours ?>" data-form="<?php echo $course_form ?>">
          <?php
          switch ($center_slug) {
            case "umo":
              echo do_shortcode('[contact-form-7 id="828" title="Форма (Учебно-методический отдел)"]');
              break;
            case "psih_trud":
              echo do_shortcode('[contact-form-7 id="824" title="Форма («Психология труда»)"]');
              break;
            case "cis":
              echo do_shortcode('[contact-form-7 id="821" title="Форма (Центр информационной безопасности)"]');
              break;
            case "csas":
              echo do_shortcode('[contact-form-7 id="822" title="Форма (Центр сертификации и аттестации специалистов)"]');
              break;
            case "ckpss":
              echo do_shortcode('[contact-form-7 id="826" title="Форма (Центр корпоративной подготовки сотрудников и студентов)"]');
              break;
            case "dvuctb":
              echo do_shortcode('[contact-form-7 id="825" title="Форма (Центр в области обеспечения транспортной безопасности)"]');
              break;
            case "mck":
              echo do_shortcode('[contact-form-7 id="827" title="Форма (Центр компетенций в строительной и транспортной областях)"]');
              break;
            case "uac_tech":
              echo do_shortcode('[contact-form-7 id="823" title="Форма («Технолог»)"]');
              break;
            default:
              echo do_shortcode('[contact-form-7 id="120" title="Как поступить"]');
          }
          ?>
        </div>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <section class="second-section container">
    <div class="content">
      <div class="left">
        <div class="description">
          <h3 class="h3">О программе</h3>
          <div>
            <?php the_field('course_description') ?>
          </div>
        </div>
      </div>
      <div class="right">
        <?php $picture = $decor['picture']; ?>
        <div class="img">
          <img src="<?php echo $picture ?>" alt="">
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>