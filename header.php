<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <?php wp_head(); ?>
</head>

<body>
  <header class="mini-header">
    <div class="container">
      <a href="tel:+7 (4212) 407-181">+7 (4212) 407-181</a>
      <?php echo do_shortcode('[bvi text="Версия для слабовидящих"]'); ?>
      <a href="mailto:ipk@festu.khv.ru">ipk@festu.khv.ru</a>
    </div>
  </header>
  <header class="header">
    <div class="container">
      <a href="<?php echo get_home_url(); ?>" class="header-logo">
        <img src="http://ido-dvgups.ru/wp-content/uploads/logo.png" alt="logo">
      </a>
      <?php
      wp_nav_menu([
        'theme_location'  => 'glav',
        'menu'            => 'menu-1',
        'container'       => 'nav',
        'container_class' => 'menu mobile-hidden',
        'menu_class'      => 'menu mobile-hidden',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'items_wrap'      => '<ul class="menu-links">%3$s</ul>',
      ]);
      ?>
      <div class="burger-menu desktop-hidden">
      </div>
    </div>
  </header>
  <?php
      wp_nav_menu([
        'theme_location'  => 'glav',
        'menu'            => 'menu-1',
        'container'       => 'nav',
        'container_class' => 'menu desktop-hidden',
        'menu_class'      => 'menu desktop-hidden',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'items_wrap'      => '<ul class="menu-links">%3$s</ul>',
      ]);
  ?>