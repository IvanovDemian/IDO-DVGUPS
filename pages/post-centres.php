<?php get_header(); ?>

<main id="center" class="container">
  <section class="center">
    <h2 class="h2"><?php echo get_the_title(); ?></h2>
    <div class="content">
      <div class="description">
        <?php echo the_field('text-center'); ?>
      </div>
    </div>
  </section>
  <section class="contacts">
    <div class="crm">
      <div class="crm-left">
        <div class="contacts-card">
          <div class="contacts-card-info">
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Руководитель</span>
              <span class="contacts-card-info__field"><?php the_field('director_name'); ?></span>
            </div>
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Кабинет</span>
              <span class="contacts-card-info__field"><?php the_field('place'); ?></span>
            </div>
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Email</span>
              <a class="contacts-card-info__field" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
            </div>
            <div class="contacts-card-info__item">
              <span class="contacts-card-info__description">Телефон</span>
              <a class="contacts-card-info__field" href="tel:<?php the_field('tel_1'); ?>"><?php the_field('tel_1'); ?></a>
            </div>
            <?php if (get_field('tel_2')) : ?>
              <div class="contacts-card-info__item">
                <span class="contacts-card-info__description">Телефон</span>
                <a class="contacts-card-info__field" href="tel:<?php the_field('tel_2'); ?>"><?php the_field('tel_2'); ?></a>
              </div>
            <?php endif; ?>
            <?php if (get_field('site')) : ?>
              <div class="contacts-card-info__item">
                <span class="contacts-card-info__description">Сайт</span>
                <a class="contacts-card-info__field" href="tel:<?php the_field('site'); ?>"><?php the_field('site'); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php
      global $post;
      $post_slug = $post->post_name;
      ?>
      <div class="crm-right" style="display: flex;">
        <?php
        switch ($post_slug) {
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
    </div>
  </section>
</main>

<?php get_footer(); ?>