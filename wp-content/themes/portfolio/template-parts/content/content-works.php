<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<?php
$post_id = get_the_ID();
?>
<article id="post-<?= $post_id; ?>" <?php post_class(); ?>>
	<a href="<?= get_post_meta($post_id, 'EntryData_WorksUrl', true); ?>" target="_blank">
		<?php
		$image = get_the_post_thumbnail_url();
		if(empty($image)) {
			$image = get_stylesheet_directory_uri() . '/assets/images/noimage.gif';
		}
		?>
		<div class="thumb" style="background-image: url(<?= $image; ?>);"></div>
		<div class="info">
			<div>
				<?php
				echo '<h2>' . get_the_title() . '</h2>';
				$categories = get_the_terms($post_id, 'scope');
				if(!empty($categories)) {
					echo '<p class="category">';
					foreach($categories as $c) {
						echo '<span>#' . $c->name . '</span>';
					}
					echo '</p>';
				}
				?>
			</div>
		</div>
	</a>

</article><!-- #post-<?php the_ID(); ?> -->
