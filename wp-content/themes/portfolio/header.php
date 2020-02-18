<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>

    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <?php
    if(is_home() || is_front_page()) {
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">';
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/top.css">';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>';
    }
    if(is_post_type_archive('post') || is_category() || is_author()) {
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/blog.css">';
    }
    if(is_post_type_archive('works')) {
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/works.css">';
    }
    if(is_single()) {
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/single.css">';
    }
    if(is_page('about')) {
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/about.css">';
    }
    ?>
    <script src="https://kit.fontawesome.com/dbb12507c5.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">
            <div class="logo">
                <h1 class="site-title">NCH</h1>
            </div>
            <nav>
				<?php echo get_nav('グローバルナビゲーション'); ?>
            </nav>
            <div id="toggleNav"></div>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
        <?php if(!is_home() && !is_front_page()) : ?>
            <section class="page_header">
                <?php
                $page_title = get_the_title();
                if(is_archive()) {
                    $page_title = esc_html(get_post_type_object(get_post_type())->label);
                }
                if(get_post_type($post) == 'post') {
                    $page_title = 'ブログ';
                }
                ?>
                <h1><?= $page_title; ?></h1>
            </section>
        <?php endif; ?>