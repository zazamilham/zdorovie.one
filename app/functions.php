<?php
//================================================== 
//===== подключаем поддержку миниатюр на всех типах страниц
//================================================== 

add_theme_support('post-thumbnails', array('post', 'page', 'doctors', 'services', 'slider'));


//================================================== 
//===== общие стили
//================================================== 

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style('google-font-style', 'https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900&display=swap&subset=cyrillic');
		wp_enqueue_style('normalize-style', get_stylesheet_directory_uri() . '/assets/vendor/css/normalize.css', array(), null);
		wp_enqueue_style('font-awesome-style', get_stylesheet_directory_uri() . '/assets/vendor/css/all.css', array(), null);
		wp_enqueue_style('animate-style', get_stylesheet_directory_uri() . '/assets/vendor/css/animate.min.css', array(), null);
		wp_enqueue_style('slick-style', get_stylesheet_directory_uri() . '/assets/vendor/css/slick.css', array(), null);
		wp_enqueue_style('sweetalert2-style', get_stylesheet_directory_uri() . '/assets/vendor/css/sweetalert2.css', array(), null);
		// wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/theme/css/style.css', array(), time());
		wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/theme/css/style.css', array(), '2.5');
		wp_enqueue_style('wp-style', get_stylesheet_uri());
	}
);


//================================================== 
//===== общие скрипты
//================================================== 

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_script('jquery');
		wp_enqueue_script('yastatic-script', 'https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js', array('jquery'), null, true);
		wp_enqueue_script('yashare-script', 'https://yastatic.net/share2/share.js', array('jquery'), null, true);
		wp_enqueue_script('mark-script', get_template_directory_uri() . '/assets/vendor/js/jquery.mark.min.js', array('jquery'), null, true);
		wp_enqueue_script('slick-script', get_template_directory_uri() . '/assets/vendor/js/slick.js', array('jquery'), null, true);
		wp_enqueue_script('sweetalert2-script', get_template_directory_uri() . '/assets/vendor/js/sweetalert2.all.js', array('jquery'), null, true);
		// wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/theme/js/main.js', array('jquery'), time(), true);
		wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/theme/js/main.js', array('jquery'), '2.5', true);
	}
);


//================================================== 
//===== скрипты главной страницы
//================================================== 

// add_action(
// 	'wp_enqueue_scripts',
// 	function () {
// 		if (is_front_page()) {
// 			wp_enqueue_script('homepage-script', get_template_directory_uri() . '/assets/theme/js/_homepage.js', array('jquery'), null, true);
// 			// wp_enqueue_script( '2gis-script', 'https://maps.api.2gis.ru/2.0/loader.js?pkg=full', array('jquery'), null, true );
// 		}
// 	}
// );


//================================================== 
//===== скрипт живого поиска на странице списка докторов
//================================================== 

// add_action(
// 	'wp_enqueue_scripts',
// 	function () {
// 		if (is_page(235)) {
// 			wp_enqueue_script('doctors-search-script', get_template_directory_uri() . '/assets/js/_doctors-search.js', array('jquery'), null, true);
// 		}
// 	}
// );


//================================================== 
//===== скрипт аккардеона страницы услуг
//================================================== 

// add_action(
// 	'wp_enqueue_scripts',
// 	function () {
// 		// if (is_category([6062, 'services'])) {
// 		wp_enqueue_script('mark-script', get_template_directory_uri() . '/assets/theme/js/_jquery.mark.min.js', array('jquery'), null, true);
// 		wp_enqueue_script('services-script', get_template_directory_uri() . '/assets/theme/js/_services.js', array('jquery'), null, true);
// 		// }
// 	}
// );


//================================================== 
//===== меняем скрипт редактора Gutenberg
//================================================== 

add_action(
	'enqueue_block_editor_assets',
	function () {
		wp_enqueue_style(
			'my-gutenberg-editor-style',
			get_stylesheet_directory_uri() . "/assets/theme/css/editor.css",
			array(),
			// time()
			'2.4'
		);
	}
);


//================================================== 
//===== Фильтрует максимальное количество слов в отрывке сообщения.
//================================================== 

add_filter(
	'excerpt_length',
	function () {
		return 15;
	}
);
add_filter(
	'excerpt_more',
	function ($more) {
		return '...';
	}
);


//================================================== 
//===== миниатюры для постов
//================================================== 

add_theme_support('post-thumbnails', array('post'));


//================================================== 
//===== регистрируем области меню
//================================================== 

register_nav_menus(
	array(
		'head_menu' => 'Верхнее меню',
		'footer_menu-1' => 'Футер меню - столбец 1',
		'footer_menu-2' => 'Футер меню - столбец 2',
		'footer_menu-3' => 'Футер меню - столбец 3',
		'footer_menu-4' => 'Футер меню - столбец 4'
	)
);


//================================================== 
//===== Регистрируем тип записей "слайдер"
//================================================== 

add_action(
	'init',
	function () {
		$labels = array(
			'name' => 'Слайды',
			'singular_name' => 'Слайд', // админ панель Добавить->Функцию
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый слайд', // заголовок тега <title>
			'edit_item' => 'Редактировать слайд',
			'new_item' => 'Новый слайд',
			'all_items' => 'Все слайды',
			'view_item' => 'Просмотр слайда на сайте',
			'search_items' => 'Искать слайд',
			'not_found' =>  'Слайдов не найдено.',
			'not_found_in_trash' => 'В корзине нет слайдов.',
			'menu_name' => 'Слайдер' // ссылка в меню в админке
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, // показывать интерфейс в админке
			'show_in_rest' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-gallery', // иконка в меню
			'menu_position' => 2, // порядок в меню
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields'),
			'hierarchical' => false
		);
		register_post_type('slider', $args);
	}
);


//================================================== 
//===== Регистрируем сообщения записей "слайдер"
//================================================== 

add_filter(
	'post_updated_messages',
	function ($messages) {
		global $post, $post_ID;

		$messages['slider'] = array( // .slider - название созданного нами типа записей
			0 => '', // Данный индекс не используется.
			1 => sprintf('Слайд обновлён. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			2 => 'Параметр обновлён.',
			3 => 'Параметр удалён.',
			4 => 'Слайд обновлён',
			5 => isset($_GET['revision']) ? sprintf('Слайд восстановлен из редакции: %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6 => sprintf('Слайд опубликован на сайте. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			7 => 'Слайд сохранен.',
			8 => sprintf('Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			9 => sprintf('Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
			10 => sprintf('Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		);

		return $messages;
	}
);


//================================================== 
//===== Remove <p> and <br/> from Contact Form 7
//================================================== 

add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function ($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	return $content;
});


//================================================== 
//===== Заменим слово «записи» на «новости»
//================================================== 

add_filter(
	'post_type_labels_post',
	function ($labels) {
		$new = array(
			'name'                  => 'Новости',
			'singular_name'         => 'Новость',
			'add_new'               => 'Добавить новость',
			'add_new_item'          => 'Добавить новость',
			'edit_item'             => 'Редактировать новость',
			'new_item'              => 'Новая новость',
			'view_item'             => 'Просмотреть новость',
			'search_items'          => 'Поиск новостей',
			'not_found'             => 'Новостей не найдено.',
			'not_found_in_trash'    => 'Новостей в корзине не найдено.',
			'parent_item_colon'     => '',
			'all_items'             => 'Все новости',
			'archives'              => 'Архивы новостей',
			'insert_into_item'      => 'Вставить в новость',
			'uploaded_to_this_item' => 'Загруженные для этой новости',
			'featured_image'        => 'Миниатюра новости',
			'filter_items_list'     => 'Фильтровать список новостей',
			'items_list_navigation' => 'Навигация по списку новостей',
			'items_list'            => 'Список новостей',
			'menu_name'             => 'Новости',
			'name_admin_bar'        => 'Новость', // пункте "добавить"
		);

		return (object) array_merge((array) $labels, $new);
	}
);


//================================================== 
//===== Регистрируем сообщения записей "новости"
//================================================== 

add_filter(
	'post_updated_messages',
	function ($messages) {
		global $post, $post_ID;

		$messages['post'] = array( // news - название созданного нами типа записей
			0 => '', // Данный индекс не используется.
			1 => sprintf('Новость обновлена. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			2 => 'Параметр обновлён.',
			3 => 'Параметр удалён.',
			4 => 'Новость обновлена',
			5 => isset($_GET['revision']) ? sprintf('Новость восстановлена из редакции: %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6 => sprintf('Новость опубликована на сайте. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			7 => 'Новость сохранена.',
			8 => sprintf('Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			9 => sprintf('Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
			10 => sprintf('Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		);

		return $messages;
	}
);


//================================================== 
//===== Регистрируем таксономии для  "услуги"
//================================================== 

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	register_taxonomy( 'services_type', [ 'services' ], [
		'label'               => '', // определяется параметром $labels->name
		'labels'              => [
			'name'              => 'Тип', //Имя таксономии, обычно во множественном числе
			'singular_name'     => 'Тип', //Название для одного элемента этой таксономии. 
			'search_items'      => 'Найти тип', //Текст для поиска элемента таксономии.
			'all_items'         => 'Все типы', //Текст для всех элементов.
			'view_item '        => 'Посмотреть тип', //Текст для просмотра термина таксономии.
			'popular_items' 		=> 'Популярные типы', //Текст для блока популярных элементов.
			'parent_item'       => 'Родительский тип', //Текст для родительского элемента таксономии.
			'parent_item_colon' => 'Родительский тип:', //Текст для родительского элемента таксономии, тоже что и parent_item но с двоеточием в конце. 
			'edit_item'         => 'Редактировать тип', //Текст для редактирования элемента. 
			'update_item'       => 'Обновить тип', //Текст для обновления элемента.
			'add_new_item'      => 'Добавить новый тип', //Текст для добавления нового элемента таксономии. 
			'new_item_name'     => 'Новое название типа', //Текст для создания нового элемента таксономии.
			'menu_name'         => 'Типы записей Услуги', //Текст для названия меню. Эта строка обозначает название для пунктов меню. По умолчанию значение параметра name;
			'back_to_items'     => '← Назад к типам', //Текст "← Перейти к рубрикам". Метка, отображаемая после обновления термина.
		],
		'description'           => 'Тип записи "Услуги"', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => false, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

add_action( 'init', function (){
	register_taxonomy_for_object_type( 'services_type', 'services');
});


//================================================== 
//===== Регистрируем тип записей "услуги"
//================================================== 

add_action(
	'init',
	function () {
		$labels = array(
			'name' => 'Услуги',
			'singular_name' => 'Услуга', // админ панель Добавить->Функцию
			'add_new' => 'Добавить новую',
			'add_new_item' => 'Добавить новую услугу', // заголовок тега <title>
			'edit_item' => 'Редактировать услугу',
			'new_item' => 'Новая услуга',
			'all_items' => 'Все услуги',
			'view_item' => 'Просмотр услуги на сайте',
			'search_items' => 'Искать услугу',
			'not_found' =>  'Услуг не найдено.',
			'not_found_in_trash' => 'В корзине нет услуг.',
			'menu_name' => 'Услуги', // ссылка в меню в админке
			'archives' => 'Наши услуги',
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, // показывать интерфейс в админке
			'show_in_rest' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-database', // иконка в меню
			'menu_position' => 5, // порядок в меню
			'supports' => array('title', 'editor', 'author', 'thumbnail'),
			'taxonomies' => array('services_type'),
			'hierarchical' => true
		);
		register_post_type('services', $args);
	}
);


//================================================== 
//===== Регистрируем сообщения записей "услуги"
//================================================== 

// add_filter(
// 	'post_updated_messages',
// 	function ($messages) {
// 		global $post, $post_ID;

// 		$messages['services'] = array( // services - название созданного нами типа записей
// 			0 => '', // Данный индекс не используется.
// 			1 => sprintf('Услуга обновлена. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
// 			2 => 'Параметр обновлён.',
// 			3 => 'Параметр удалён.',
// 			4 => 'Услуга обновлена',
// 			5 => isset($_GET['revision']) ? sprintf('Услуга восстановлена из редакции: %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
// 			6 => sprintf('Услуга опубликована на сайте. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
// 			7 => 'Услуга сохранена.',
// 			8 => sprintf('Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg(
// 				'preview',
// 				'true',
// 				get_permalink($post_ID)
// 			))),
// 			9 => sprintf('Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
// 			10 => sprintf('Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
// 		);

// 		return $messages;
// 	}
// );


//================================================== 
//===== добляем свои столбцы в админку на список услуг
//================================================== 

add_action(
	'manage_services_posts_columns',
	function ($columns) {
		unset($columns['comments']);

		$my_columns = [
			'cat' => 'Разделы',
			'type' => 'Тип',
			'price' => 'Цена',
			'active' => 'Активно'
		];

		return array_slice($columns, 0, 1) + $columns + $my_columns;
	}
);


//================================================== 
//===== добляем свои столбцы в админку на список услуг
//================================================== 

add_action(
	'manage_services_posts_custom_column',
	function ($column_name) {
		if ($column_name === 'cat') {
			the_field('services_cat');
		}
		if ($column_name === 'type') {
			the_field('services_type');
		}
		if ($column_name === 'price') {
			if (get_field('services_price')) {
				echo get_field('services_price') . '₽';
			} else {
				echo "--";
			}
		}
		if ($column_name === 'active') {
			the_field('services_active');
		}
	}
);


//================================================== 
//===== редактируем стили своих столбцов в админке на список услуг
//================================================== 

add_action(
	'admin_print_footer_scripts-edit.php',
	function () {
?>
<style>
.column-cat {
    width: 160px;
}

.column-type {
    width: 80px;
}

.column-price {
    width: 80px;
}

.column-active {
    width: 80px;
}
</style>
<?php
	}
);


//================================================== 
//===== добавляем свой фильтр в админку на список услуг
//================================================== 

add_filter(
	'parse_query',
	function ($query) {
		global $pagenow;
		if (is_admin() && $pagenow == 'edit.php') {
			//добавлям фильтрацию по городу в запрос
			if (!empty($_GET['services_type_value'])) {
				$query->query_vars['meta_key'] = 'services_type';
				$query->query_vars['meta_value'] = $_GET['services_type_value'];
			}
		}
	}
);

add_action(
	'restrict_manage_posts',
	function () {
		global $wpdb, $pagenow;

		if ($pagenow != 'edit.php') return;
		$out = '';

		switch ($_GET['post_type']) {
			case 'services':
				//фильтр 
				$fieldname = 'services_type_value';
				//надо выбрать все уникальные значения поля для показа
				//в выпадающем поле
				$rows = $wpdb->get_results("SELECT DISTINCT meta_value FROM {$wpdb->postmeta} 
        WHERE meta_key = 'services_type' ORDER BY meta_value", ARRAY_N);

				//собираем HTML код SELECT со списком городов
				$out .= '<select name="' . $fieldname . '">
        <option value="">Все типы</option>';

				foreach ($rows as $row) {
					if (isset($_GET[$fieldname]) && $_GET[$fieldname] == $row[0])
						$out .= sprintf(
							'<option value="%s" selected>%s</option>',
							$row[0],
							$row[0]
						);
					else
						$out .= sprintf(
							'<option value="%s">%s</option>',
							$row[0],
							$row[0]
						);
				}
				$out .= '</select>';
		}
		//покажем созданный фильтр
		echo $out;
	}
);


//================================================== 
//===== добляем свои столбцы в админку на список врачей
//================================================== 

add_action(
	'manage_doctors_posts_columns',
	function ($columns) {
		unset($columns['comments']);

		$my_columns = [
			'active' => 'Активно'
		];

		return array_slice($columns, 0, 1) + $columns + $my_columns;
	}
);


//================================================== 
//===== добляем свои столбцы в админку на список врачей
//================================================== 

add_action(
	'manage_doctors_posts_custom_column',
	function ($column_name) {
		if ($column_name === 'active') {
			the_field('doctors_active');
		}
	}
);


//================================================== 
//===== Цвета строк страниц/постов в админке в зависимости от статуса
//================================================== 

add_action(
	'admin_footer',
	function () {
		echo '<style type="text/css">
    .status-draft   { background: #FCE3F2 !important; }
    .status-pending { background: #87C5D6 !important; }
    .status-future  { background: #C6EBF5 !important; }
    .status-private { background: #F2D46F !important; }
    </style>';
	}
);


//================================================== 
//===== Регистрируем тип записей "Врачи"
//================================================== 

add_action(
	'init',
	function () {
		$labels = array(
			'name' => 'Врачи',
			'singular_name' => 'Врач', // админ панель Добавить->Функцию
			'add_new' => 'Добавить врача',
			'add_new_item' => 'Добавить нового врача', // заголовок тега <title>
			'edit_item' => 'Редактировать врача',
			'new_item' => 'Новый врач',
			'all_items' => 'Все врачи',
			'view_item' => 'Просмотр страницы врача на сайте',
			'search_items' => 'Искать врача',
			'not_found' =>  'Врачей не найдено.',
			'not_found_in_trash' => 'В корзине нет врачей.',
			'menu_name' => 'Врачи' // ссылка в меню в админке
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true, // показывать интерфейс в админке
			'show_in_rest' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups', // иконка в меню
			'menu_position' => 6, // порядок в меню
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields'),
			'hierarchical' => false
		);
		register_post_type('doctors', $args);
	}
);


//================================================== 
//===== Регистрируем сообщения записей "Врачи"
//================================================== 

add_filter(
	'post_updated_messages',
	function ($messages) {
		global $post, $post_ID;

		$messages['slider'] = array( // .slider - название созданного нами типа записей
			0 => '', // Данный индекс не используется.
			1 => sprintf('Слайд обновлён. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			2 => 'Параметр обновлён.',
			3 => 'Параметр удалён.',
			4 => 'Слайд обновлён',
			5 => isset($_GET['revision']) ? sprintf('Слайд восстановлен из редакции: %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6 => sprintf('Слайд опубликован на сайте. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
			7 => 'Слайд сохранен.',
			8 => sprintf('Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
			9 => sprintf('Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
			10 => sprintf('Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		);

		return $messages;
	}
);


//================================================== 
//===== добавляем свои размеры миниатюр изображений
//================================================== 

add_image_size('blog-page_cover_list', 785, 286, true);
add_image_size('blog-page_cover_wide', 1000, 365, true);
add_image_size('blog-page_cover_slide', 1920, 700, true);
add_image_size('doctor-list_cover', 240, 330, true);
add_image_size('doctor-page_cover', 460, 9999, false);


//================================================== 
//===== Новый размер в выбор размеров при вставке картинки (админ-панель)
//================================================== 

add_filter(
	'image_size_names_choose',
	function ($sizes) {
		return array_merge($sizes, array(
			'blog-page_cover_list' => 'Обложка страницы поста - список постов',
			'blog-page_cover_wide' => 'Обложка страницы поста верхняя - шапка колонки',
			'blog-page_cover_slide' => 'Обложка страницы поста верхняя - обложка ввиде слайда',
			'doctor-list_cover' => 'Фото врача для общего списка ',
			'doctor-page_cover' => 'Фото врача для личной страницы',
		));
	}
);

//================================================== 
//===== скрипты настройки контента сайта
//================================================== 

$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

add_action(
	'admin_menu',
	function () {
		global $true_page;
		add_theme_page('Наполнение сайта', 'Наполнение сайта', 'manage_options', $true_page, 'true_option_page');
	}
);

function true_option_page()
{
	global $true_page;
?><div class="wrap">
    <h2>Настройка контента сайта</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
			settings_fields('true_options'); // меняем под себя только здесь (название настроек)
			do_settings_sections($true_page);
			?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
<?php
}

add_action(
	'admin_init',
	function () {
		global $true_page;
		// Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
		register_setting('true_options', 'true_options', 'true_validate_settings'); // true_options



		// Добавляем первую секцию
		add_settings_section('true_section_1', 'Общие данные', '', $true_page);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'number_phone',
			'desc'      => 'Введите номер телефона компании', // описание
			'label_for' => 'number_phone' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('number_phone_field', 'Номер телефона', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'dir_number_phone',
			'desc'      => 'Введите номер телефона директора', // описание
			'label_for' => 'number_phone' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('dir_number_phone_field', 'Номер телефона директора', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'email_to_send',
			'desc'      => 'Введите E-mail для получения писем от посетителей.', // описание
			'label_for' => 'email_to_send' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('email_to_send_field', 'E-mail', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'flamp_link',
			'desc'      => 'Введите ссылку на компанию на Флампе', // описание
			'label_for' => 'flamp_link' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('flamp_link_field', 'Фламп', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'vk_link',
			'desc'      => 'Введите ссылку на компанию на Вконтакте', // описание
			'label_for' => 'vk_link' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('vk_link_field', 'Вконтакте', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'insta_link',
			'desc'      => 'Введите ссылку на компанию на Инстаграм', // описание
			'label_for' => 'insta_link' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('insta_link_field', 'Инстаграм', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'paddin2'
		);
		add_settings_field('padding2_field', '', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params);



		// Добавляем вторую секцию
		add_settings_section('true_section_2', 'Контакты отделений', '', $true_page);

		// Создадим чекбокс
		$true_field_params = array(
			'type'      => 'checkbox', //типа
			'id'        => 'checkbox_1',
			'desc'      => 'Активировать показ информации на сайте' //описание
		);
		add_settings_field('checkbox_1_field', 'Отделение №1', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'adres_1',
			'desc'      => 'Введите адрес первого отдленения', // описание
			'label_for' => 'adres_1' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('adres_1_field', 'Адрес', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_1_1',
			'desc'      => 'Введите время работы первого отдленения в будни', // описание
			'label_for' => 'worktime_1_1' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('time_1_1_field', 'Время работы в будни', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_2_1',
			'desc'      => 'Введите время работы первого отдленения в выходные', // описание
			'label_for' => 'worktime_2_1' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('time_2_1_field', 'Время работы в выходные', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding3'
		);
		add_settings_field('padding3_field', '', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);



		// Создадим чекбокс
		$true_field_params = array(
			'type'      => 'checkbox', //типа
			'id'        => 'checkbox_2',
			'desc'      => 'Активировать показ информации на сайте' //описание
		);
		add_settings_field('checkbox_2_field', 'Отделение №2', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'adres_2',
			'desc'      => 'Введите адрес второго отдленения', // описание
			'label_for' => 'adres_2' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('adres_2_field', 'Адрес', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_1_2',
			'desc'      => 'Введите время работы второго отдленения в будни', // описание
			'label_for' => 'worktime_1_2' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_1_2_field', 'Время работы в будни', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_2_2',
			'desc'      => 'Введите время работы второго отдленения в выходные', // описание
			'label_for' => 'worktime_2_2' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_2_2_field', 'Время работы в выходные', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding4'
		);
		add_settings_field('padding4_field', '', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);



		// Создадим чекбокс
		$true_field_params = array(
			'type'      => 'checkbox', //типа
			'id'        => 'checkbox_3',
			'desc'      => 'Активировать показ информации на сайте' //описание
		);
		add_settings_field('checkbox_3_field', 'Отделение №3', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'adres_3',
			'desc'      => 'Введите адрес третьего отдленения', // описание
			'label_for' => 'adres_3' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('adres_3_field', 'Адрес', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_1_3',
			'desc'      => 'Введите время работы третьго отдленения в будни', // описание
			'label_for' => 'worktime_1_3' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_1_3_field', 'Время работы в будни', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_2_3',
			'desc'      => 'Введите время работы первого отдленения в выходные', // описание
			'label_for' => 'worktime_2_3' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_2_3_field', 'Время работы в выходные', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding5'
		);
		add_settings_field('padding5_field', '', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);



		// Создадим чекбокс
		$true_field_params = array(
			'type'      => 'checkbox', //типа
			'id'        => 'checkbox_4',
			'desc'      => 'Активировать показ информации на сайте' //описание
		);
		add_settings_field('checkbox_4_field', 'Отделение №4', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'adres_4',
			'desc'      => 'Введите адрес четвертого отдленения', // описание
			'label_for' => 'adres_4' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('adres_4_field', 'Адрес', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_1_4',
			'desc'      => 'Введите время работы третьго отдленения в будни', // описание
			'label_for' => 'worktime_1_4' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_1_4_field', 'Время работы в будни', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_2_4',
			'desc'      => 'Введите время работы первого отдленения в выходные', // описание
			'label_for' => 'worktime_2_4' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_2_4_field', 'Время работы в выходные', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding6'
		);
		add_settings_field('padding6_field', '', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);



		// Создадим чекбокс
		$true_field_params = array(
			'type'      => 'checkbox', //типа
			'id'        => 'checkbox_5',
			'desc'      => 'Активировать показ информации на сайте' //описание
		);
		add_settings_field('checkbox_5_field', 'Отделение №5', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'adres_5',
			'desc'      => 'Введите адрес пятого отдленения', // описание
			'label_for' => 'adres_5' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('adres_5_field', 'Адрес', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_1_5',
			'desc'      => 'Введите время работы третьго отдленения в будни', // описание
			'label_for' => 'worktime_1_5' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_1_5_field', 'Время работы в будни', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим текстовое поле в секции
		$true_field_params = array(
			'type'      => 'text', // тип
			'id'        => 'worktime_2_5',
			'desc'      => 'Введите время работы первого отдленения в выходные', // описание
			'label_for' => 'worktime_2_5' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
		);
		add_settings_field('worktime_2_5_field', 'Время работы в выходные', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding7'
		);
		add_settings_field('padding7_field', '', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params);



		// Добавляем третью секцию настроек
		add_settings_section('true_section_3', 'Подписи разделов главной страницы', '', $true_page);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'index_services',
			'desc'      => 'Желательно не более трех строчек'
		);
		add_settings_field('index_services_field', 'Наши услуги', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'index_whywe',
			'desc'      => 'Желательно не более трех строчек'
		);
		add_settings_field('index_whywe_field', 'Почему мы', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'index_doctors',
			'desc'      => 'Желательно не более трех строчек'
		);
		add_settings_field('index_doctors_field', 'Наши специалисты', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'index_calltodir',
			'desc'      => 'Желательно не более трех строчек'
		);
		add_settings_field('index_calltodir_field', 'Позвонить директору', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params);

		// Создадим отступ в секции
		$true_field_params = array(
			'type'      => 'padding', // тип
			'id'        => 'padding8'
		);
		add_settings_field('padding8_field', '', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params);



		// Добавляем четвертую секцию настроек
		add_settings_section('true_section_4', 'Инфоблоки в футере', '', $true_page);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'footer_block1'
		);
		add_settings_field('footer_block1_field', 'Столбец №1', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'footer_block2'
		);
		add_settings_field('footer_block2_field', 'Столбец №2', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'footer_block3'
		);
		add_settings_field('footer_block3_field', 'Столбец №3', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params);

		// Создадим textarea в секции
		$true_field_params = array(
			'type'      => 'textarea',
			'id'        => 'footer_block4'
		);
		add_settings_field('footer_block4_field', 'Столбец №4', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params);
	}
);


function true_option_display_settings($args)
{
	extract($args);

	$option_name = 'true_options';

	$o = get_option($option_name);

	switch ($type) {
		case 'text':
			$o[$id] = esc_attr(stripslashes($o[$id]));
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'textarea':
			$o[$id] = esc_attr(stripslashes($o[$id]));
			echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
			echo ($desc != '') ? $desc : "";
			echo "</label>";
			break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach ($vals as $v => $l) {
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";
			break;
		case 'radio':
			echo "<fieldset>";
			foreach ($vals as $v => $l) {
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";
			break;
		case 'image':
			$o[$id] = esc_attr(stripslashes($o[$id]));
			if (function_exists('true_image_uploader_field')) {
				true_image_uploader_field($option_name . '[' . $id . ']', $o[$id]);
			}
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'padding':
			echo '<div></div>';
			break;
	}
}

function true_validate_settings($input)
{
	foreach ($input as $k => $v) {
		$valid_input[$k] = trim($v);

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}


//================================================== 
//===== скрипт для загрузки изображений на странице настройки контента сайта
//================================================== 

add_action(
	'admin_enqueue_scripts',
	function () {
		if (!did_action('wp_enqueue_media')) {
			wp_enqueue_media();
		}
		wp_enqueue_script('myuploadscript', get_stylesheet_directory_uri() . '/assets/vendor/js/admin-content.js', array('jquery'), null, false);
	}
);

function true_image_uploader_field($name, $value = '', $w = 115, $h = 90)
{
	$default = get_stylesheet_directory_uri() . '/assets/theme/img/no_img.png';
	if ($value) {
		$image_attributes = wp_get_attachment_image_src($value, array($w, $h));
		$src = $image_attributes[0];
	} else {
		$src = $default;
	}
	echo '
	<div>
		<img data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
		<div>
			<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
			<button type="submit" class="upload_image_button button">Загрузить</button>
			<button type="submit" class="remove_image_button button">×</button>
		</div>
	</div>
	';
}