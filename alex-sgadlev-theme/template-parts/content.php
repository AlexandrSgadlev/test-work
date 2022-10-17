<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alex-sgadlev-theme
 */

?>
<div class="container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php alex_sgadlev_theme_before_content(); ?>
			
				<?php
				if ( !is_singular() ){
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				};

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						alex_sgadlev_theme_posted_on();
						alex_sgadlev_theme_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			

			<?php alex_sgadlev_theme_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'alex-sgadlev-theme' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alex-sgadlev-theme' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>