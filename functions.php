<?php

/**
 * ido-dvgups functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ido-dvgups
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/*	Temlates	*/
add_filter('template_include', 'my_template');
function my_template($template)
{

	// Черновики
	if (is_page('perechen-programm')) {
		return get_stylesheet_directory() . '/pages/programs-list_old.php';
	}
	if (is_page('timetable_old')) {
		return get_stylesheet_directory() . '/pages/timetable_old.php';
	}

	// Главная
	global $post;
	if ($post->ID == 9) {
		return get_stylesheet_directory() . '/home.php';
	}

	// Слушателю
	if (is_page('listener')) {
		return get_stylesheet_directory() . '/listener.php';
	}
	if (is_page('kak-postupit')) {
		return get_stylesheet_directory() . '/pages/kak-postupit.php';
	}
	if (is_page('request')) {
		return get_stylesheet_directory() . '/pages/request.php';
	}
	if (is_page('ankety')) {
		return get_stylesheet_directory() . '/pages/ankety.php';
	}
	global $post;
	if ($post->post_parent == '32' && !is_page('ankety')) {
		return get_stylesheet_directory() . '/pages/anketa.php';
	}
	if (is_page('timetable')) {
		return get_stylesheet_directory() . '/pages/timetable.php';
	}

	// Программы
	if (is_page('catalog')) {
		return get_stylesheet_directory() . '/pages/catalog.php';
	}
	if (is_page('samples')) {
		return get_stylesheet_directory() . '/pages/samples.php';
	}
	if (is_page('programs-list')) {
		return get_stylesheet_directory() . '/pages/programs-list.php';
	}

	// Об институте
	if (is_page('about')) {
		return get_stylesheet_directory() . '/pages/about.php';
	}
	if (is_page('centers')) {
		return get_stylesheet_directory() . '/pages/centers.php';
	}
	if (is_page('statistics')) {
		return get_stylesheet_directory() . '/pages/statistics.php';
	}
	if (is_page('3d-tour')) {
		return get_stylesheet_directory() . '/pages/3d-tour.php';
	}

	// Контакты
	if (is_page('contacts')) {
		return get_stylesheet_directory() . '/pages/contacts.php';
	}

	// Филиалы
	if (is_page('filials')) {
		return get_stylesheet_directory() . '/pages/filials.php';
	}

	// Центры
	global $post;
	if ($post->post_type == 'centres') {
		return get_stylesheet_directory() . '/pages/post-centres.php';
	}

	// Новости
	global $post;
	if ($post->post_type == 'news') {
		return get_stylesheet_directory() . '/pages/post-news.php';
	}

	// Программы
	global $post;
	if ($post->post_type == 'courses') {
		return get_stylesheet_directory() . '/pages/post-courses.php';
	}
	if (is_page('courses')) {
		return get_stylesheet_directory() . '/pages/courses.php';
	}
	if (is_tax('coursescat', 'additional')) {
		return get_stylesheet_directory() . '/pages/coursescat/additional.php';
	}
	if (is_tax('coursescat', 'qualification')) {
		return get_stylesheet_directory() . '/pages/coursescat/qualification.php';
	}
	if (is_tax('coursescat', 'retraining')) {
		return get_stylesheet_directory() . '/pages/coursescat/retraining.php';
	}

	// Страницы подвала
	if (is_page('archive')) {
		return get_stylesheet_directory() . '/pages/archive.php';
	}
	if (is_page('videos')) {
		return get_stylesheet_directory() . '/pages/videos.php';
	}

	return $template;
}

// Удаление пунктов меню
add_action("admin_menu", "remove_menus");
function remove_menus()
{
	remove_menu_page("edit-comments.php");        # Комментарии
	remove_menu_page("edit.php"); 								# Записи
}
// add_filter('plugin_action_links_contact-form-7/wp-contact-form-7.php', 'my_plugin_rename');
// function my_plugin_rename($links)
// {
// 	$links = str_replace('Contact Form 7', 'Новое название плагина', $links);
// 	return $links;
// }
add_action('admin_menu', 'add_separator_29');

function add_separator_29()
{
	global $menu;
	$position = 29; // Позиция разделителя (перед пунктом меню "Настройки")
	$menu[$position] = array('', 'read', 'separator-' . $position, '', 'wp-menu-separator');
}
// add_action('admin_menu', 'wpcf7_admin_menu');
// function wpcf7_admin_menu()
// {
// 	add_menu_page(
// 		'Contact Form 7', // тайтл страницы
// 		'Contact Form 7', // текст ссылки в меню
// 		'wpcf7_read_contact_forms',
// 		'wpcf7',
// 		'wpcf7_admin_management_page',
// 		'dashicons-email',
// 		31,
// 	);
// }
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ido_dvgups_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ido-dvgups, use a find and replace
		* to change 'ido-dvgups' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('ido-dvgups', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails', array('centres'));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ido-dvgups'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ido_dvgups_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ido_dvgups_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ido_dvgups_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ido_dvgups_content_width', 640);
}
add_action('after_setup_theme', 'ido_dvgups_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ido_dvgups_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ido-dvgups'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ido-dvgups'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ido_dvgups_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ido_dvgups_scripts()
{
	wp_enqueue_style('fancybox-style', get_template_directory_uri() . '/assets/css/fancybox.css', array(), _S_VERSION);
	wp_enqueue_style('normalize-style', get_template_directory_uri() . '/assets/css/normalize.min.css', array(), _S_VERSION);
	wp_enqueue_style('font-style', get_template_directory_uri() . '/assets/font/style.css', array(), _S_VERSION);
	wp_enqueue_style('ido-dvgups-style', get_stylesheet_uri(), array(), '1.0.25'); //time()
	wp_style_add_data('ido-dvgups-style', 'rtl', 'replace');


	wp_enqueue_script('ido-dvgups-fancyboxjs', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array(), '1.0.10', true);
	wp_enqueue_script('ido-dvgups-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.15', true); //time()
	// wp_enqueue_script('ido-dvgups-script', get_template_directory_uri() . '/assets/js/script.min.js', array(), '1.0.0', true);
	wp_enqueue_script('ido-dvgups-slider', get_template_directory_uri() . '/assets/js/slider.js', array(), '1.0.13', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ido_dvgups_scripts');

function admin_style()
{
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.10', true);
}
add_action('admin_enqueue_scripts', 'admin_styles');

function admin_styles()
{
	echo '<style>
    .header {
      font-family: "Lucida Grande" !important;
      font-size: 12px;
    } 
  </style>';
}

add_action('init', 'register_post_types');
function register_post_types()
{

	// Центры
	register_taxonomy('centrescat', ['centres'], [
		'label'                 => 'Рубрика центров', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Рубрики центров',
			'singular_name'     => 'Рубрика',
			'search_items'      => 'Искать рубрики',
			'all_items'         => 'Все рубрики',
			'parent_item'       => 'Родит. рубрика',
			'parent_item_colon' => 'Родит. рубрика:',
			'edit_item'         => 'Редактировать рубрику',
			'update_item'       => 'Обновить рубрику',
			'add_new_item'      => 'Добавить рубрику',
			'new_item_name'     => 'Центры рубрика',
			'menu_name'         => 'Рубрика',
		),
		'description'           => 'Рубрики для центров', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'rewrite'               => array('slug'=>'centres', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	]);
	register_post_type('centres', [
		'label'  => null,
		'labels' => [
			'name'               => 'Центры', // основное название для типа записи
			'singular_name'      => 'Центр', // название для одной записи этого типа
			'add_new'            => 'Добавить центр', // для добавления новой записи
			'add_new_item'       => 'Добавление центра', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование центра', // для редактирования типа записи
			'new_item'           => 'Новый центр', // текст новой записи
			'view_item'          => 'Смотреть центр', // для просмотра записи этого типа.
			'search_items'       => 'Искать центр', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Центры', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		<path d="M17.5258 12.9715V9.77635C17.5258 9.47196 17.2799 9.22559 16.9755 9.22559L2.88866 9.22559C2.5847 9.22559 2.33789 9.47196 2.33789 9.77635L2.33789 12.9715C2.33789 13.2759 2.5847 13.5223 2.88866 13.5223C3.19262 13.5223 3.43899 13.2759 3.43899 12.9715V10.3267H16.4247V12.9715C16.4247 13.2759 16.6715 13.5223 16.9755 13.5223C17.2799 13.5221 17.5258 13.2757 17.5258 12.9715Z" fill="black"/>
		<path d="M10.482 12.9714V7.0703C10.482 6.7659 10.2356 6.51953 9.93119 6.51953C9.62679 6.51953 9.38086 6.7659 9.38086 7.0703V12.9714C9.38086 13.2758 9.62679 13.5222 9.93119 13.5222C10.2356 13.5222 10.482 13.2756 10.482 12.9714Z" fill="black"/>
		<path d="M14.3164 15.264C14.3164 13.7967 15.5098 12.6035 16.9762 12.6035C18.4426 12.6035 19.6355 13.7969 19.6355 15.264C19.6355 16.7308 18.4426 17.9242 16.9762 17.9242C15.5098 17.9242 14.3164 16.7308 14.3164 15.264Z" fill="black"/>
		<path d="M7.29688 15.264C7.29688 13.7967 8.48984 12.6035 9.95666 12.6035C11.4226 12.6035 12.6156 13.7969 12.6156 15.264C12.6156 16.7308 11.4226 17.9242 9.95666 17.9242C8.48984 17.9242 7.29688 16.7308 7.29688 15.264Z" fill="black"/>
		<path d="M5.54764 15.264C5.54764 16.7308 4.35467 17.9242 2.88874 17.9242C1.42192 17.9242 0.228516 16.7308 0.228516 15.264C0.228516 13.7967 1.42192 12.6035 2.88874 12.6035C4.35489 12.6035 5.54764 13.7967 5.54764 15.264Z" fill="black"/>
		<path d="M6.48438 7.07013V2.35013C6.48438 2.04618 6.73119 1.7998 7.03514 1.7998L12.8795 1.7998C13.1835 1.7998 13.4303 2.04618 13.4303 2.35013V7.07035C13.4303 7.37431 13.1835 7.62068 12.8795 7.62068H7.03514C6.73119 7.62046 6.48438 7.37409 6.48438 7.07013Z" fill="black"/>
		</svg>'),
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title', 'thumbnail', 'page-attributes'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['centrescat'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// Новости
	register_taxonomy('newscat', ['news'], [
		'label'                 => 'Рубрика новостей', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Рубрики новостей',
			'singular_name'     => 'Рубрика',
			'search_items'      => 'Искать рубрики',
			'all_items'         => 'Все рубрики',
			'parent_item'       => 'Родит. рубрика',
			'parent_item_colon' => 'Родит. рубрика:',
			'edit_item'         => 'Редактировать рубрику',
			'update_item'       => 'Обновить рубрику',
			'add_new_item'      => 'Добавить рубрику',
			'new_item_name'     => 'Новая рубрика',
			'menu_name'         => 'Рубрика',
		),
		'description'           => 'Рубрики для новостей', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'rewrite'               => array('slug'=>'news', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	]);
	register_post_type('news', [
		'label'  => null,
		'labels' => [
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новость', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование новости', // для редактирования типа записи
			'new_item'           => 'Новая новость', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Искать новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		<path d="M17.2 14.1875C17.2 14.4361 17.1052 14.6746 16.9364 14.8504C16.7676 15.0262 16.5387 15.125 16.3 15.125C16.0613 15.125 15.8324 15.0262 15.6636 14.8504C15.4948 14.6746 15.4 14.4361 15.4 14.1875V2.9375C15.4 2.68886 15.3052 2.4504 15.1364 2.27459C14.9676 2.09877 14.7387 2 14.5 2H1.9C1.66131 2 1.43239 2.09877 1.2636 2.27459C1.09482 2.4504 1 2.68886 1 2.9375V15.125C1 15.6223 1.18964 16.0992 1.52721 16.4508C1.86477 16.8025 2.32261 17 2.8 17H16.3C17.7886 17 19 15.7381 19 14.1875V4.8125H17.2V14.1875ZM10 4.8125H12.7V6.6875H10V4.8125ZM10 8.5625H12.7V10.4375H10V8.5625ZM3.7 4.8125H8.2V10.4375H3.7V4.8125ZM3.7 14.1875V12.3125H12.7V14.1875H3.7Z" fill="black"/>
		</svg>'),
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['newscat'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	register_taxonomy('lessonscat', ['lessons'], [
		'label'               => 'Рубрика занятий', // определяется параметром $labels->name
		'labels'              => array(
			'name'              => 'Рубрики занятий',
			'singular_name'     => 'Рубрика',
			'search_items'      => 'Искать рубрики',
			'all_items'         => 'Все рубрики',
			'parent_item'       => 'Родит. рубрика',
			'parent_item_colon' => 'Родит. рубрика:',
			'edit_item'         => 'Редактировать рубрику',
			'update_item'       => 'Обновить рубрику',
			'add_new_item'      => 'Добавить рубрику',
			'new_item_name'     => 'Новая рубрика',
			'menu_name'         => 'Рубрика',
		),
		'description'           => 'Рубрики для занятий', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => false, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'rewrite'               => array('slug'=>'news', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	]);

	// Мероприятия
	register_post_type('events', [
		'label'  => null,
		'labels' => [
			'name'               => 'Мероприятия', // основное название для типа записи
			'singular_name'      => 'Мероприятие', // название для одной записи этого типа
			'add_new'            => 'Добавить мероприятие', // для добавления новой записи
			'add_new_item'       => 'Добавление мероприятия', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование мероприятия', // для редактирования типа записи
			'new_item'           => 'Новое мероприятие', // текст новой записи
			'view_item'          => 'Смотреть мероприятие', // для просмотра записи этого типа.
			'search_items'       => 'Искать мероприятия', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Мероприятия', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		<path d="M17.2193 2.8983L6.66602 6.66664V12.5L7.28935 12.7225L6.35018 14.6008C6.24321 14.8143 6.18342 15.0484 6.17484 15.2871C6.16626 15.5257 6.20911 15.7635 6.30047 15.9841C6.39184 16.2048 6.52959 16.4033 6.70437 16.566C6.87916 16.7288 7.08691 16.852 7.31352 16.9275L10.7168 18.0616C11.0976 18.1858 11.5101 18.1697 11.88 18.0165C12.25 17.8632 12.553 17.5828 12.7343 17.2258L13.8202 15.0541L17.2193 16.2683C17.345 16.3131 17.4797 16.3271 17.6119 16.3091C17.7441 16.2911 17.8701 16.2416 17.9792 16.1647C18.0883 16.0879 18.1774 15.9859 18.2389 15.8675C18.3004 15.7491 18.3326 15.6176 18.3327 15.4841V3.68247C18.3326 3.54901 18.3004 3.41754 18.2389 3.2991C18.1774 3.18067 18.0883 3.07874 17.9792 3.00189C17.8701 2.92504 17.7441 2.87552 17.6119 2.85749C17.4797 2.83946 17.345 2.85346 17.2193 2.8983ZM11.2435 16.4808L7.84102 15.3466L8.87018 13.2875L12.2385 14.4908L11.2435 16.4808ZM3.33268 12.5H4.99935V6.66664H3.33268C2.41352 6.66664 1.66602 7.41414 1.66602 8.3333V10.8333C1.66602 11.7525 2.41352 12.5 3.33268 12.5Z" fill="black"/>
		</svg>'),
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => false,
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// Занятия
	register_post_type('lessons', [
		'label'  => null,
		'labels' => [
			'name'               => 'Занятия', // основное название для типа записи
			'singular_name'      => 'Занятие', // название для одной записи этого типа
			'add_new'            => 'Добавить занятие', // для добавления новой записи
			'add_new_item'       => 'Добавление занятия', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование занятия', // для редактирования типа записи
			'new_item'           => 'Новое занятие', // текст новой записи
			'view_item'          => 'Смотреть занятие', // для просмотра записи этого типа.
			'search_items'       => 'Искать занятие', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Занятия', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		<path d="M19 18V4C19 2.897 18.103 2 17 2H15V0H13V2H7V0H5V2H3C1.897 2 1 2.897 1 4V18C1 19.103 1.897 20 3 20H17C18.103 20 19 19.103 19 18ZM7 16H5V14H7V16ZM7 12H5V10H7V12ZM11 16H9V14H11V16ZM11 12H9V10H11V12ZM15 16H13V14H15V16ZM15 12H13V10H15V12ZM17 7H3V5H17V7Z" fill="white"/>
		</svg>'),
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['lessonscat'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// Видеорепортажи
	register_taxonomy('videoscat', ['videos'], [
		'label'               => 'Рубрика видео', // определяется параметром $labels->name
		'labels'              => array(
			'name'              => 'Рубрики видео',
			'singular_name'     => 'Рубрика',
			'search_items'      => 'Искать видео',
			'all_items'         => 'Все рубрики',
			'parent_item'       => 'Родит. рубрика',
			'parent_item_colon' => 'Родит. рубрика:',
			'edit_item'         => 'Редактировать рубрику',
			'update_item'       => 'Обновить рубрику',
			'add_new_item'      => 'Добавить рубрику',
			'new_item_name'     => 'Новая рубрика',
			'menu_name'         => 'Рубрика',
		),
		'description'           => 'Рубрики для видео', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => false, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'rewrite'               => array('slug'=>'news', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	]);
	register_post_type('videos', [
		'label'  => null,
		'labels' => [
			'name'               => 'Видеорепортажи', // основное название для типа записи
			'singular_name'      => 'Видеорепортаж', // название для одной записи этого типа
			'add_new'            => 'Добавить видео', // для добавления новой записи
			'add_new_item'       => 'Добавление видео', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование видеорепортажа', // для редактирования типа записи
			'new_item'           => 'Новый видеорепортаж', // текст новой записи
			'view_item'          => 'Смотреть видеорепортаж', // для просмотра записи этого типа.
			'search_items'       => 'Искать видеорепортажи', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Видеорепортажи', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => false, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-video-alt3',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['videoscat'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	// Курсы
	register_taxonomy('coursescat', ['courses'], [
		'label'               => 'Категория программ', // определяется параметром $labels->name
		'labels'              => array(
			'name'              => 'Категории программ',
			'singular_name'     => 'Категория программы',
			'search_items'      => 'Искать категории программ',
			'all_items'         => 'Все категории',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Редактировать',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить',
			'new_item_name'     => 'Новый категорию',
			'menu_name'         => 'Категории',
		),
		'description'           => 'Категории программ', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'rewrite'               => array('slug'=>'news', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	]);
	register_post_type('courses', [
		'label'  => null,
		'labels' => [
			'name'               => 'Программы', // основное название для типа записи
			'singular_name'      => 'Программа', // название для одной записи этого типа
			'add_new'            => 'Добавить программу', // для добавления новой записи
			'add_new_item'       => 'Добавление программы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование программы', // для редактирования типа записи
			'new_item'           => 'Новая программа', // текст новой записи
			'view_item'          => 'Смотреть программу', // для просмотра записи этого типа.
			'search_items'       => 'Искать программу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Программы', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 21,
		'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		<path d="M7.14286 4.28561H12.8571V2.85704H7.14286V4.28561ZM3.21429 4.28561V18.5713H2.5C1.81548 18.5713 1.22768 18.3258 0.736607 17.8347C0.245536 17.3436 0 16.7558 0 16.0713V6.78561C0 6.10109 0.245536 5.51329 0.736607 5.02222C1.22768 4.53115 1.81548 4.28561 2.5 4.28561H3.21429ZM15.7143 4.28561V18.5713H4.28571V4.28561H5.71429V2.4999C5.71429 2.20228 5.81845 1.9493 6.02679 1.74097C6.23512 1.53263 6.4881 1.42847 6.78571 1.42847H13.2143C13.5119 1.42847 13.7649 1.53263 13.9732 1.74097C14.1815 1.9493 14.2857 2.20228 14.2857 2.4999V4.28561H15.7143ZM20 6.78561V16.0713C20 16.7558 19.7545 17.3436 19.2634 17.8347C18.7723 18.3258 18.1845 18.5713 17.5 18.5713H16.7857V4.28561H17.5C18.1845 4.28561 18.7723 4.53115 19.2634 5.02222C19.7545 5.51329 20 6.10109 20 6.78561Z" fill="black"/>
		</svg>'),
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['coursescat'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
	register_post_type('curators', [
		'label'  => null,
		'labels' => [
			'name'               => 'Кураторы', // основное название для типа записи
			'singular_name'      => 'Куратор', // название для одной записи этого типа
			'add_new'            => 'Добавить куратора', // для добавления новой записи
			'add_new_item'       => 'Добавление куратора', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование куратора', // для редактирования типа записи
			'new_item'           => 'Новый куратор', // текст новой записи
			'view_item'          => 'Смотреть куратора', // для просмотра записи этого типа.
			'search_items'       => 'Искать куратора', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Кураторы', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => 'edit.php?post_type=courses', // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 24,
		'menu_icon'           => 'dashicons-admin-users',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => false,
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}
add_action('init', 'my_custom_post_status');
function my_custom_post_status()
{
	register_post_status('archive', array(
		'label'                     => _x('Архив', 'lessons'),
		'label_count'               => _n_noop('Архив <span class="count">(%s)</span>', 'В архиве <span class="count">(%s)</span>'),
		'public'                    => false,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true
	));
}
// function custom_courses_columns($columns)
// {
// 	$columns['course_curator'] = 'Куратор';
// 	return $columns;
// }
// add_filter('manage_courses_posts_columns', 'custom_courses_columns');

// function custom_courses_column_content($column_name, $post_id)
// {
// 	if ($column_name == 'course_curator') {
// 		$curator = get_field('course_curator', $post_id);
// 		$post = $curator;
// 		// setup_postdata($post);
// 		$course_curator = the_field('curator_phone');
// 		if (!empty($curator)) {
// 			echo $curator->post_title;
// 		} else {
// 			echo 'N/A';
// 		}
// 	}
// }
// add_action('manage_courses_posts_custom_column', 'custom_courses_column_content', 10, 2);
function custom_admin_css()
{
	echo '<style>.column-taxonomy-coursescat { width: 20%; }</style>';
	echo '<style>.column-course_curator { width: 20%; }</style>';
	echo '<style type="text/css">';
	echo '.column-course_price--qef-type-number-- { max-width:200px !important; width:200px !important; }';
	echo '.column-course_hours--qef-type-number-- { max-width:200px !important; width:200px !important; }';
	echo '#menu-posts-popup { display: none; }';
	echo '#toplevel_page_bvi { display: none; }';
	echo '.wpallexport-plugin .wpallexport-logo { width:0; display:none; }';
	echo '.wpallexport-plugin .wpallexport-title > h2:before, .wpallexport-plugin .wpallexport-title > h3:before { width:0; display: none; }';
	echo '.wpallimport-plugin .wpallimport-logo { width:0; display:none; }';
	echo '.wpallimport-plugin .wpallimport-title > h2:before, .wpallimport-plugin .wpallimport-title > h3:before { width:0; display: none; }';
	echo '.wpallexport-collapsed-content .form-table input[name="friendly_name"] { min-width: 300px; }';
	echo '</style>';
	echo '<style>.custom-admin-button { background: #46ffd7 !important; margin-right: 10px !important;}</style>';
	echo '<style>.wp-admin-bar-aam { display: none; }</style>';
	// echo '<style>body.wp-core-ui .add-new-h2, body.wp-core-ui .page-title-action, body.wp-core-ui .add-new-h2:active, body.wp-core-ui .page-title-action:active, body.wp-core-ui .button { color: #FFFFFF;}</style>';
}
add_action('admin_head', 'custom_admin_css');
function change_post_status_on_type()
{
	$args = array(
		'post_type' => 'lessons',
		'posts_per_page' => -1,
		'post_status' => 'publish'
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$post_id = get_the_ID();
			$date = get_field('lesson_date', $post_id);
			$timedate = strtotime($date . '+1 day');
			if ($timedate < time()) {
				$post = array(
					'ID' => $post_id,
					'post_status' => 'archive',
				);
				wp_update_post($post);
			}
		}
		wp_reset_postdata();
	}
}
add_action('init', 'change_post_status_on_type');
function update_post_title_from_acf($post_id)
{
	if (get_post_type($post_id) == 'lessons') {
		$new_title = get_field('lesson_date', $post_id);
		if ($new_title) {
			$post_data = array(
				'ID'         => $post_id,
				'post_title' => $new_title,
			);
			wp_update_post($post_data);
		}
	}
}
add_action('acf/save_post', 'update_post_title_from_acf', 20);
function true_append_post_status_list()
{
	global $post;
	$optionselected = '';
	$statusname = '';
	if ($post->post_type == 'lessons') { // если хотите, можете указать тип поста, для которого регистрируем статус, а можете и вовсе избавиться от этого условия
		if ($post->post_status == 'archive') { // если посту присвоен статус архива
			$optionselected = ' selected="selected"';
			$statusname = "$('#post-status-display').text('В архиве');";
		}
		/*
		 * Код jQuery мы просто выводим в футере
		 */
		echo "<script>
		jQuery(function($){
			$('select#post_status').append('<option value=\"archive\"$optionselected>Архив</option>');
			$statusname
		});
		</script>";
	}
}
add_action('admin_footer-post-new.php', 'true_append_post_status_list');
add_action('admin_footer-post.php', 'true_append_post_status_list');
function true_status_display($statuses)
{
	global $post;
	if (get_query_var('post_status') != 'archive') { // проверка, что мы не находимся на странице всех постов данного статуса
		if ($post->post_status == 'archive') { // если статус поста - Архив
			return array('В архиве');
		}
	}
	return $statuses;
}

add_filter('display_post_states', 'true_status_display');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

Flush_rewrite_rules();

// add_filter('jpeg_quality', create_function('', 'return 100;'));

// Исправление пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

// Скрываем версию WordPress
function true_remove_wp_version_wp_head_feed()
{
	return '';
}
add_filter('the_generator', 'true_remove_wp_version_wp_head_feed');

function custom_admin_button()
{
	// Проверяем, является ли текущая страница страницей вывода постов типа "courses"
	if (is_admin() && get_current_screen()->base === 'edit' && get_current_screen()->post_type === 'courses') {
		echo '<a href="https://ido-dvgups.ru/wp-admin/admin.php?page=pmxe-admin-manage" class="button custom-admin-button">Export</a>';
		echo '<a href="https://ido-dvgups.ru/wp-admin/admin.php?page=pmxi-admin-manage" class="button custom-admin-button">Import</a>';
	}
}
add_action('manage_posts_extra_tablenav', 'custom_admin_button');

// Ставим ссылку на себя в футере в админке
function change_admin_footer()
{
	$footer_text = array(
		//'Спасибо вам за творчество с <a href="http://wordpress.org">WordPress</a>',
		'Разработал <a href="https://vk.com/ivanovdemian" target="_blank">Иванов Демьян</a>'
	);
	return implode(' • ', $footer_text);
}

add_filter('admin_footer_text', 'change_admin_footer');

// function hide_posts_based_on_acf_value($query)
// {
// 	// Проверяем, является ли текущая страница административной панелью
// 	// и пользователь не является администратором
// 	if (is_admin()) {
// 		// Получаем ID текущего пользователя
// 		$current_user_id = get_current_user_id();

// 		// Проверяем ID пользователя
// 		if ($current_user_id === 2) {
// 			// Замените 123 на ID конкретного пользователя, для которого вы хотите скрыть записи

// 			if (isset($query->query['courses']) && $query->query['courses'] === 'courses') {
// 				$meta_query = array(
// 					// 'relation' => 'AND',
// 					array(
// 						'key' => 'course_center',
// 						'value' => array(816),
// 						'compare' => 'NOT IN',
// 					),
// 				);

// 				$query->set('meta_query', $meta_query);

// 				// $query->set('post_type', 'courses');
// 			}
// 			// Здесь 'field_name' - это имя поля ACF (post object field), а 'post_id' - ID записи, которую нужно скрыть

// 		} else {
// 			// echo 'not hehe';
// 		}
// 	}
// }
// add_action('pre_get_posts', 'hide_posts_based_on_acf_value');
add_action( 'pre_get_posts', 'wp_kama_pre_get_posts_action' );

function wp_kama_pre_get_posts_action( $query ){
	$centers = array(
		2 => 816,
		4 => 113,
	);
	// Проверяем, является ли текущая страница административной панелью
	// и пользователь не является администратором
	if (is_admin()) {
		// Получаем ID текущего пользователя
		$current_user_id = get_current_user_id();

		// Проверяем ID пользователя
		if (isset($centers[$current_user_id])) {
			// Замените 123 на ID конкретного пользователя, для которого вы хотите скрыть записи

			if (isset($query->query['post_type']) && $query->query['post_type'] == 'courses') {
				$meta_query = array(
					// 'relation' => 'AND',
					array(
						'key' => 'course_center',
						'value' => $centers[$current_user_id],
						'compare' => 'IN',
					),
				);

				$query->set('meta_query', $meta_query);

				// $query->set('post_type', 'courses');
			}
			// Здесь 'field_name' - это имя поля ACF (post object field), а 'post_id' - ID записи, которую нужно скрыть

		} else {
			// echo 'not hehe';
		}
	}
}

add_filter('user_has_cap', function ($allcaps, $cap, $args) {
	// Проверяем, что роль пользователя - редактор и он пытается редактировать запись
	if (!empty($args[0]) && $args[0] === 'edit_post' && !empty($args[1])) {
		$post_id = $args[1];
		$user_id = get_current_user_id();

		// Получаем значение поля ACF из записи
		$acf_value = get_field('course_center', $post_id);

		// Если значение поля ACF является записью и ее ID не равен 123, а у пользователя нет ID равного 2, то запрещаем редактирование записи
		if (is_a($acf_value, 'WP_Post') && $acf_value->ID == 816 && $user_id == 2) {
			$allcaps['edit_post'] = false;
		}
	}

	return $allcaps;
}, 10, 3);

// add_action( 'init', function() {
// 	remove_action( 'admin_notices', array( WP_Installer::instance(), 'setup_plugins_page_notices' ) );
// 	remove_action( 'admin_notices', array( WP_Installer::instance(), 'setup_plugins_renew_warnings' ), 10 );
// 	remove_action( 'admin_notices', array( WP_Installer::instance(), 'queue_plugins_renew_warnings' ), 20 );
// }, 100);

add_filter( 'site_transient_update_plugins', 'filter_plugin_updates_1' );
function filter_plugin_updates_1( $value ) {
	unset( $value->response['wp-all-export-pro/wp-all-export-pro.php'] );
	return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates_2' );
function filter_plugin_updates_2( $value ) {
	unset( $value->response['wp-all-import-pro/wp-all-import-pro.php'] );
	return $value;
}