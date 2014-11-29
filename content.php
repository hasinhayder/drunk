<?php
/**
 * @package drunk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("posts"); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php drunk_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if(has_post_thumbnail()):?>
		<div class="entry-thumb">
			<?php the_post_thumbnail();?>
		</div>
	<?php endif;?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'drunk' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'drunk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php drunk_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->