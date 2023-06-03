<?php $decor = get_field('course_decor'); ?>
<?php $picture = $decor['picture']; ?>
<a class="course-card" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $picture ?>');">
  <div class="blackout"></div>
  <div class="course-info">
    <div class="course-info-rows">
      <div class="course-info__row">
        <span><?php the_field('course_form'); ?></span>
      </div>
      <div class="course-info__row">
        <span class="hours-field"><?php the_field('course_hours'); ?> часов</span>
      </div>
      <div class="course-info__row">
        <span><?php the_field('course_price'); ?> ₽</span>
      </div>
    </div>
    <h3 class="h3"><?php the_title(); ?></h3>
  </div>
</a>