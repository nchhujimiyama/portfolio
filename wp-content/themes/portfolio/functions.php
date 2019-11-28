<?php
/*******************************************************
 * 子テーマ設定
 *******************************************************/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


/**
 * ADD POSTTYPE
 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'works', [
        'labels' => [
            'name' => '制作実績',
            'singular_name' => 'works',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_position' => 3,
        'show_in_rest' => false,
    ]);
}

/**
 * BLOG SLUG CUSTOMIZE
 */
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'blog';
	}
	return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );