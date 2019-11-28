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

/**
 * NAVIGATION
 */
function get_nav($atts) {
    $str = '<ul>';
    $menu = wp_get_nav_menu_items($atts, array());
    foreach($menu as $m){
        $str .= '<li><a href="'.$m->url.'">'.$m->title.'</a></li>';
    }
    $str .= '</ul>';

    return $str;
}


/**
 * TOP WORKS
 */
function get_post_list($posttype, $num) {
    $str = '';
    $args = array(
        'post_type' => $posttype,
        'post_status' => 'publish',
        'posts_per_page' => $num
    );
    $the_query = new WP_Query($args);
    if($the_query->have_posts()) {
        while($the_query->have_posts()) {
            $the_query->the_post();
            $str .= '<article>
                <a href="' . get_the_permalink() . '">
                    <h3>' . get_the_title() . '</h3>
                </a>
            </article>';
        }
    } else {
        $str = '<div class="no-content"><p>準備中です。</p></div>';
    }
    wp_reset_postdata();

    return $str;
}


/**
 * ADD CUSTOM FIELDS
 */
add_action( 'admin_menu', 'add_custom_field' );
function add_custom_field() {
    add_meta_box( 'custom-EntryData_WorksUrl', 'URL', 'create_EntryData_WorksUrl', 'works', 'normal' );;
}
function create_EntryData_WorksUrl() {
    $keyname = 'EntryData_WorksUrl';
    global $post;
    $get_value = get_post_meta( $post->ID, $keyname, true );
    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
    echo '<input type="text" name="' . $keyname . '" value="' . $get_value . '">';
}
add_action( 'save_post', 'save_custom_field' );
function save_custom_field( $post_id ) {
    $custom_fields = ['EntryData_WorksUrl'];
    foreach( $custom_fields as $d ) {
        if ( isset( $_POST['nonce-' . $d] ) && $_POST['nonce-' . $d] ) {
            if( check_admin_referer( 'action-' . $d, 'nonce-' . $d ) ) {
                if( isset( $_POST[$d] ) && $_POST[$d] ) {
                    update_post_meta( $post_id, $d, $_POST[$d] );
                } else {
                    delete_post_meta( $post_id, $d, get_post_meta( $post_id, $d, true ) );
                }
            }
        }
    }
}