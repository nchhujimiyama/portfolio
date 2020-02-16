<a class="post" href="<?= get_permalink(); ?>">
	<?php
	$thumb = get_the_post_thumbnail_url();
	if(empty($thumb)) $thumb = get_stylesheet_directory_uri() . '/assets/images/noimage.gif';
	?>
	<div class="thumb" style="background-image: url(<?= $thumb; ?>)"></div>
	<div class="info">
		<h2><?php the_title(); ?></h2>
		<time><span class="upload"><?php the_time('Y/m/d'); ?></span><span class="update"><?php the_modified_date('Y/m/d'); ?></span></time>
	</div>
</a>