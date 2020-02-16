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
add_action( 'init', 'add_taxonomy' );
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
        'supports' => array('title','editor','thumbnail','revisions','page-attributes')
    ]);
}
function add_taxonomy() {
    register_taxonomy(
        'scope',
        'works',
        array(
            'label' => '担当範囲',
            'singular_label' => '担当範囲',
            'labels' => array(
                'all_items' => '担当範囲一覧',
                'add_new_item' => '担当範囲を追加'
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'hierarchical' => true
        )
    );
}
function add_custom_column( $defaults ) {
    $defaults['region'] = '担当範囲';
    return $defaults;
}
add_filter('manage_works_posts_columns', 'add_custom_column');
function add_custom_column_id($column_name, $id) {
    if( $column_name == 'scope' ) {
        echo get_the_term_list($id, 'scope', '', ', ');
    }
}
add_action('manage_works_posts_custom_column', 'add_custom_column_id', 10, 2);
function sort_custom_columns( $columns ) {
    $columns = array(
      'cb'     => '<input type="checkbox" />',
      'title'  => 'タイトル',
      'scope' => '担当範囲',
      'date'   => '日時'
    );
    return $columns;
}
add_filter( 'manage_works_posts_columns', 'sort_custom_columns' );

/**
 * BLOG SLUG CUSTOMIZE
 */
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = array(
            'slug' => 'blog',
            'with_front' => false,
        );
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
 * PAGINATION
 */
function the_pagination() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
        return;
    echo '<nav class="pagination">';
    echo paginate_links( array(
        'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var('paged') ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '&larr;',
        'next_text'    => '&rarr;',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
    ) );
    echo '</nav>';
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
            $thumb = get_the_post_thumbnail_url('medium');
            if(empty($thumb)) $thumb = get_stylesheet_directory_uri() . '/assets/images/noimage.gif';
            $date = '';
            $category = '';
            if($posttype === 'post') {
                $date = '<p class="date"><time>' . get_the_date('Y/m/d') . '</time><time>' . get_the_modified_date('Y/m/d') . '</time></p>';
                $categories = get_the_category();
                if(!empty($categories)) {
                    $category .= '<p class="category">';
                    foreach($categories as $c) {
                        $category .= '<span>#' . $c->cat_name . '</span>';
                    }
                    $category .= '</p>';
                }
            }
            $str .= '<article class="post-list-item">
                <a href="' . get_the_permalink() . '">
                    <div class="thumb" style="background-image: url(' . $thumb . ');"></div>
                    <div class="info">
                        <h3>' . get_the_title() . '</h3>
                        ' . $category . '
                        ' . $date . '
                    </div>
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