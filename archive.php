<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php drunk_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
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
