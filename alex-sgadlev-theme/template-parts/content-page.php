<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alex-sgadlev-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php alex_sgadlev_theme_post_thumbnail(); ?>

	<?php alex_sgadlev_theme_before_content(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alex-sgadlev-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
