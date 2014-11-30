<?php
/**
 * @package drunk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("wow fadeIn"); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php drunk_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


	</header><!-- .entry-header -->
	<?php if(has_post_thumbnail()):?>
		<div class="entry-thumb wow fadeIn">
			<?php the_post_thumbnail();?>
		</div>
	<?php endif;?>
	<div class="entry-content">
		<?php the_content(); ?>
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
