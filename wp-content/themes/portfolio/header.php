<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
    <?php
    if(is_home() || is_front_page()) {
        echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/top.css">';
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
		</header><!-- #masthead -->

	<div id="content" class="site-content">