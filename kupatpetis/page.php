<?php
/* replace paren't page.php
 * add <div class="content-wrap">
 */

get_header(); ?>

	<div id="primary" class="site-content">
            <div class="content-wrap">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
            </div><!-- .content-wrap -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>