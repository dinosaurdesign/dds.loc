<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function true_remove_default_widget() {
	unregister_widget( 'WP_Widget_Archives' ); // Архивы
	unregister_widget( 'WP_Widget_Calendar' ); // Календарь
	unregister_widget( 'WP_Widget_Categories' ); // Рубрики
	unregister_widget( 'WP_Widget_Meta' ); // Мета
	unregister_widget( 'WP_Widget_Pages' ); // Страницы
	unregister_widget( 'WP_Widget_Recent_Comments' ); // Свежие комментарии
	unregister_widget( 'WP_Widget_Recent_Posts' ); // Свежие записи
	unregister_widget( 'WP_Widget_RSS' ); // RSS
	unregister_widget( 'WP_Widget_Search' ); // Поиск
	unregister_widget( 'WP_Widget_Tag_Cloud' ); // Облако меток
	unregister_widget( 'WP_Widget_Text' ); // Текст
	unregister_widget( 'WP_Nav_Menu_Widget' ); // Произвольное меню
}
