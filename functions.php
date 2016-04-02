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


/*
Замена слага архива типа поста Проекты
*/
function divi_change_slug_project($args, $post_type){
  if($post_type == 'project') {
    $args['rewrite']['slug'] = 'projects';
  }
  return $args;
}
add_filter( 'register_post_type_args', 'divi_change_slug_project', 100, 2 );


/*
Прочистка заголовка архивов
*/
function divi_get_the_archive_title($title){
  if(is_post_type_archive()) {
    $title = post_type_archive_title( '', false );
  }

  if(is_tax()){
    $tax = get_taxonomy( get_queried_object()->taxonomy );
    $title = single_term_title( '', false );

  }

  return $title;
}

add_filter( 'get_the_archive_title', 'divi_get_the_archive_title' );
