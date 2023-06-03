<?php get_header(); ?>

<main id="page404" class="container">

	<section class="page404 not-found">
		<h1 class="h1">404 — Страница не найдена</h1>
		<div class="description">
			<p>К сожалению, запрашиваемая Вами страница не найдена на сайте нашего института.</p>
			<p>Предлагаем перейти на <a style="color: #7986CB;" href="<?php echo get_home_url(); ?>">главную страницу</a><span id="if-courses"></span>.</p>
		</div>
	</section>

</main>

<script type="text/javascript">
	const includes = window.location.href.includes('courses');
	const span = document.querySelector('#if-courses');
	if (includes) {
		span.innerHTML = ' или <a style="color: #7986CB;" href="<?php echo get_page_link( 399 ); ?>">каталог курсов</a>';
	} else {
		span.remove();
	}
</script>

<?php get_footer(); ?>