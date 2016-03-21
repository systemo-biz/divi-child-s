<?php
//Подключение стиля родительской темы
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function s_widgets_init() {
	register_sidebar( array(
		'name' => 'Бар в футере колонка №1',
		'id' => 's-sidebar-1',
		'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_pb_widget -->',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => 'Бар в футере колонка №2',
		'id' => 's-sidebar-2',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 's_widgets_init' );