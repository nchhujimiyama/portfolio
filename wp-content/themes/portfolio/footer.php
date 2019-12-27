        <?php get_template_part('template-parts/conductor'); ?>
    </div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer-info">
            <div class="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ft_logo.jpg" alt="logo">
                <div class="sns">
                    <a href=""><i class="fa fa-github-square" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                </div>
            </div>
            <?php echo get_nav('フッターナビ'); ?>
        </div>
        <div class="copyright">
            <p>&copy; 2019 NTH-CREATE</p>
        </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php
if(is_home() || is_front_page()) {
    echo '<script src="' . get_stylesheet_directory_uri() . '/assets/js/top.js"></script>';
}
?>
</body>
</html>
