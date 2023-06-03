<?php get_header(); ?>

<main id="catalog" class="container">
  <section class="catalog">
    <h2 class="h2">Каталог программ</h2>
    <div class="content">
      <div class="filters">
        <div class="filter-row">
          <ul class="categories">
            <li class="category-button button hidden" data-link="" style="display: none;">Все категории</li>
            <?php
            $categories = get_categories([
              'taxonomy'  => 'coursescat',
              'type'      => 'courses',
              'orderby'   => 'name',
              'order'     => 'ASC',
              'parent'    => 0
            ]);

            foreach ($categories as $category) {
              echo '<li class="category-button button" data-link="' . $category->slug . '">' . $category->name . '</li>';
              // echo '<li><a class="category-button button" href="' . get_category_link($category->term_id) . '" ' . '>' . $category->name . '</a></li>';
            }
            ?>
          </ul>
          <button class="button" id="ad-filters" onclick="showSidebarFilters(this)">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 12H18M3 6H21M9 18H15" stroke="#191C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        <div class="filter-row sort-and-search">
          <div class="sorting">
            <span>Сортировка</span>
            <div class="select">
              <select id="order-select">
                <option value="date" data-order="DESC">По новизне</option>
                <option value="name" data-order="ASC">Название: А-Я</option>
                <option value="name" data-order="DESC">Название: Я-А</option>
              </select>
            </div>
          </div>
          <div class="search">
            <svg class="lens" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 21L15.0001 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#191C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <input type="text" name="s" id="order-search" placeholder="Поиск по программам">
            <svg class="clear" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 6L6 18M6 6L18 18" stroke="#191C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
        <div class="sidebar-filters">
          <div class="sidebar-filters__heading">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            </svg>
            <h2 class="h2">Фильтры</h2>
            <button class="button" onclick="closeSidebarFilters(this)">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.6569 6.65685L6.33206 17.9817M6.3376 6.6624L17.6513 17.9761" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="subcategories">
            <h3 class="h3">Подкатегории</h3>
            <ul class="filter-list" data-category="qualification">
              <?php
              $categories = get_categories([
                'taxonomy'  => 'coursescat',
                'type'      => 'courses',
                'orderby'   => 'name',
                'order'     => 'ASC',
                'child_of'  => 35
              ]);

              foreach ($categories as $category) {
                echo
                '<li class="filter-item" data-subcat="' . $category->slug . '">
                  <input type="checkbox" id="' . $category->slug . '" name="' . $category->slug . '">
                  <label for="' . $category->slug . '">' . $category->name . '</label>
                </li>';
              }
              ?>
            </ul>
            <ul class="filter-list" data-category="additional">
              <?php
              $categories = get_categories([
                'taxonomy'  => 'coursescat',
                'type'      => 'courses',
                'orderby'   => 'name',
                'order'     => 'ASC',
                'child_of'  => 37
              ]);

              foreach ($categories as $category) {
                echo
                '<li class="filter-item" data-subcat="' . $category->slug . '">
                  <input type="checkbox" id="' . $category->slug . '" name="' . $category->slug . '">
                  <label for="' . $category->slug . '">' . $category->name . '</label>
                </li>';
              }
              ?>
            </ul>
            <ul class="filter-list" data-category="retraining">
              <?php
              $categories = get_categories([
                'taxonomy'  => 'coursescat',
                'type'      => 'courses',
                'orderby'   => 'name',
                'order'     => 'ASC',
                'child_of'  => 36
              ]);

              foreach ($categories as $category) {
                echo
                '<li class="filter-item" data-subcat="' . $category->slug . '">
                  <input type="checkbox" id="' . $category->slug . '" name="' . $category->slug . '">
                  <label for="' . $category->slug . '">' . $category->name . '</label>
                </li>';
              }
              ?>
            </ul>
            <span class="subcategories-alert">Выберите категорию, чтобы увидеть подкатегории</span>
          </div>
          <div class="education-forms">
            <h3 class="h3">Форма обучения</h3>
            <ul>
              <li class="row">
                <input type="radio" id="all" name="edu-form" checked />
                <label for="all">Все</label>
                <div class="check"></div>
              </li>
              <li class="row">
                <input type="radio" id="full" name="edu-form" />
                <label for="full">Очное</label>
                <div class="check"></div>
              </li>
              <li class="row">
                <input type="radio" id="part" name="edu-form" />
                <label for="part">Очно-заочное</label>
                <div class="check"></div>
              </li>
              <li class="row">
                <input type="radio" id="corres" name="edu-form" />
                <label for="corres">Заочное</label>
                <div class="check"></div>
              </li>
              <li class="row">
                <input type="radio" id="distance" name="edu-form" />
                <label for="distance">Дистанционное</label>
                <div class="check"></div>
              </li>
            </ul>
          </div>
          <button class="button" onclick="closeSidebarFilters(this)">Подтвердить</button>
        </div>
        <div class="overlay" onclick="closeSidebarFilters(this)"></div>
      </div>
      <?php
      global $wp_query;

      $wp_query = new WP_Query(array(
        'post_type'      => 'courses',
        //'category_name' => 'courses',
        'posts_per_page' => '15',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => get_query_var('paged') ?: 1 // страница пагинации
      ));
      ?>
      <div class="courses-grid">
        <?php
        while (have_posts()) {
          the_post();
        ?>
          <?php get_template_part('template-parts/course-card'); ?>
        <?php    }    ?>
      </div>
      <!-- <nav class="navigation pagination" role="navigation">
        <button class="prev page-numbers">
          <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 11L8 6L13 1M6 11L1 6L6 1" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </button>
        <span aria-current="page" class="page-numbers current">1</span>
        <button class="next page-numbers">
          <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 11L6 6L1 1M8 11L13 6L8 1" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </и>
      </nav> -->
      <?php
      $prev_button = '<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 11L8 6L13 1M6 11L1 6L6 1" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      $next_button = '<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 11L6 6L1 1M8 11L13 6L8 1" stroke="#444444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      $pagination_array = array(
        'show_all'     => false, // показаны все страницы участвующие в пагинации
        'end_size'     => 1,     // количество страниц на концах
        'mid_size'     => 1,     // количество страниц вокруг текущей
        'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
        'prev_text'    => __($prev_button),
        'next_text'    => __($next_button),
        'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
        'screen_reader_text' => __('Posts navigation'),
        'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
      );
      // the_posts_pagination($pagination_array); // пагинация - echo тут не надо

      wp_reset_query(); // сброс $wp_query
      ?>
      <div class="search-failed" style="display: none;">
        <span>К сожелению, подходящих программ не найдено.</span>
        <span>Вы можете <a href="<?php echo get_permalink( get_page_by_path( 'catalog' ) ) ?>" style="color: #7986CB;">сбросить фильтры</a>.</span>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>