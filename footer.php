<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package drunk
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'drunk' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'drunk' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'drunk' ), 'drunk', '<a href="http://hasin.me" rel="designer">HasinHayder</a>' ); ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
