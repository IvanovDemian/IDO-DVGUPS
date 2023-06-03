<?php get_header(); ?>

<main id="timetable" class="container">
  <section class="timetable">
    <h2 class="h2">Расписание занятий</h2>

    <div class="tabs">
      <?php
      $years_repeater = get_field('years_repeater');
      ?>
      <div class="tabs-nav years">
        <?php
        if ($years_repeater) {
          foreach ($years_repeater as $slider) {
            $year = $slider['year_name']
        ?>
            <div class="tabs-nav__item" id="<?php echo $year ?>"><?php echo $year ?></div>
        <?php
          }
        }
        ?>
      </div>

      <div class="tabs-content years">
        <?php
        if ($years_repeater) {
          foreach ($years_repeater as $slider) {
            $year = $slider['year_name'];
            $months = $slider['year_group'];
        ?>
            <div class="tabs-content__item" data-tab="<?php echo $year ?>">
              <div class="tabs-nav months">
                <ul>
                  <li class="tabs-nav__item" id="january">Январь</li>
                  <li class="tabs-nav__item" id="february">Февраль</li>
                  <li class="tabs-nav__item" id="march">Март</li>
                  <li class="tabs-nav__item" id="april">Апрель</li>
                  <li class="tabs-nav__item" id="may">Май</li>
                  <li class="tabs-nav__item" id="june">Июнь</li>
                  <li class="tabs-nav__item" id="july">Июль</li>
                  <li class="tabs-nav__item" id="august">Август</li>
                  <li class="tabs-nav__item" id="september">Сентябрь</li>
                  <li class="tabs-nav__item" id="october">Октябрь</li>
                  <li class="tabs-nav__item" id="november">Ноябрь</li>
                  <li class="tabs-nav__item" id="december">Декабрь</li>
                </ul>
              </div>
              <div class="tabs-content months">
                <?php foreach ($months as $month_name => $month_value) { ?>
                  <div class="tabs-content__item" data-tab="<?php echo $month_name ?>">
                    <ul class="documents-list">
                      <?php foreach ($month_value as $month) { ?>
                        <?php
                        $link = $month['link'];
                        $link_name = $month['link_name'];
                        ?>
                        <li class="documents-list__item">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                            <path d="M6.8891 12.2333C6.73577 12.2333 6.63243 12.2483 6.5791 12.2633V13.245C6.64243 13.26 6.7216 13.2642 6.83077 13.2642C7.22993 13.2642 7.47577 13.0625 7.47577 12.7217C7.47577 12.4167 7.2641 12.2333 6.8891 12.2333V12.2333ZM9.79493 12.2433C9.62827 12.2433 9.51993 12.2583 9.45577 12.2733V14.4483C9.51993 14.4633 9.62327 14.4633 9.7166 14.4633C10.3974 14.4683 10.8408 14.0933 10.8408 13.3C10.8458 12.6083 10.4416 12.2433 9.79493 12.2433V12.2433Z" fill="#7986CB"></path>
                            <path d="M11.6666 1.66666H4.99992C4.55789 1.66666 4.13397 1.84225 3.82141 2.15481C3.50885 2.46737 3.33325 2.8913 3.33325 3.33332V16.6667C3.33325 17.1087 3.50885 17.5326 3.82141 17.8452C4.13397 18.1577 4.55789 18.3333 4.99992 18.3333H14.9999C15.4419 18.3333 15.8659 18.1577 16.1784 17.8452C16.491 17.5326 16.6666 17.1087 16.6666 16.6667V6.66666L11.6666 1.66666ZM7.91492 13.4917C7.65742 13.7333 7.27742 13.8417 6.83492 13.8417C6.74912 13.8426 6.66336 13.8376 6.57825 13.8267V15.015H5.83325V11.735C6.16946 11.6848 6.50918 11.662 6.84908 11.6667C7.31325 11.6667 7.64325 11.755 7.86575 11.9325C8.07742 12.1008 8.22075 12.3767 8.22075 12.7017C8.21992 13.0283 8.11158 13.3042 7.91492 13.4917V13.4917ZM11.0874 14.6208C10.7374 14.9117 10.2049 15.05 9.55408 15.05C9.16408 15.05 8.88825 15.025 8.70075 15V11.7358C9.03708 11.6867 9.3767 11.6636 9.71658 11.6667C10.3474 11.6667 10.7574 11.78 11.0774 12.0217C11.4232 12.2783 11.6399 12.6875 11.6399 13.275C11.6399 13.9108 11.4074 14.35 11.0874 14.6208V14.6208ZM14.1666 12.3083H12.8899V13.0675H14.0832V13.6792H12.8899V15.0158H12.1349V11.6917H14.1666V12.3083ZM11.6666 7.49999H10.8332V3.33332L14.9999 7.49999H11.6666Z" fill="#7986CB"></path>
                          </svg>
                          <a href="<?php echo $link ?>" target="_blank"><?php echo $link_name ?></a>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                <?php } ?>
              </div>
            </div>
        <?php
          }
        }
        ?>
        
      </div>
    </div>

  </section>
</main>

<?php get_footer(); ?>