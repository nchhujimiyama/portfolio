<?php

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) { ?>
			<div class="posts">

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'blog' );

			endwhile;
			?>
			</div>
			<?php
			if (function_exists( 'the_pagination' )) the_pagination();
		} else {
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
