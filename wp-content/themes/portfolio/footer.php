        <?php get_template_part('template-parts/conductor'); ?>
    </div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <p class="copyright en">&copy; 2019 - <span class="en">Atelier Hornet</span> All Right Reserved</p>
        <div class="sns">
            <a href=""><i class="fa fa-github-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
        </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?= get_stylesheet_directory_uri(); ?>/assets/js/cmn.js"></script>
<?php
if(is_home() || is_front_page()) {
    echo '<script src="' . get_stylesheet_directory_uri() . '/assets/js/top.js"></script>';
}
?>
</body>
</html>
