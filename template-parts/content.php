<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jewel_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
		<?php if( has_post_thumbnail() ){ ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail();?>
			</div>
		<?php } ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php jeweltheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( $post->post_excerpt ) {
				the_excerpt();
				echo sprintf( '<div class="continue_btn"><a href="%s" class="more-link" rel="bookmark">Continue Reading'.the_title( '<span class="screen-reader-text">"', '"</span>', false ).'</a></div>', esc_url(get_permalink()) );
			} else {
				the_content( sprintf(
					__( 'Continue Reading %s', 'jeweltheme' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jeweltheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php jeweltheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
