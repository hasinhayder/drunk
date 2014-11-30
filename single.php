<?php
/**
 * The template for displaying all single posts.
 *
 * @package drunk
 */

ob_start();
get_sidebar();
$sidebar = ob_get_clean();
$classname = "col-md-9";
if($sidebar) $classname = "col-md-8";
get_header(); ?>
<div class="container">
	<div class="row">
		<?php if(!$sidebar):?>
			<div class="col-md-2"></div>
		<?php endif; ?>
		<div class="<?php echo $classname;?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'single' ); ?>

						<?php drunk_post_nav(); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<?php if(!$sidebar):?>
			<div class="col-md-2"></div>
		<?php endif; ?>
		<?php if($sidebar):?>
			<div class="col-md-3">
				<?php echo $sidebar; ?>
			</div>
		<?php endif; ?>

	</div>
</div>


<?php get_footer(); ?>
