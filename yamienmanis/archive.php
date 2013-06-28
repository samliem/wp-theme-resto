<?php

/* replace parent's archive.php
 * 1. add <div class="content-wrap">
 * 2. conditional statement untuk cek apakah archive adalah taxonomy atau bukan
 */

get_header(); ?>

	<section id="primary" class="site-content">
            <div class="content-wrap"><!-- modification -->
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
                                        elseif ( is_tax('kategori-promosi') ) : //modification
                                                echo 'Arsip Promosi : ' . get_queried_object()->name;
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

                            //modification
                            if( is_tax('kategori-promosi') ) 
                                get_template_part( 'promosi', 'archive' );
                            else  
                        	get_template_part( 'content', get_post_format() );

			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
            </div><!-- content-wrap -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>