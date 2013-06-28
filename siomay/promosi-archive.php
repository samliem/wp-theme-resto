<?php
/**
 * Template ini digunakan untuk menampilkan
 * daftar promosi yang sudah dibuat
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
                    <?php
                        
                        global $jrl_theme_options;
                        $post_content = $jrl_theme_options['post_content']; 
                        
                        if( has_post_thumbnail() ) : ?>
                            <div class="promo-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- .promo-thumbnail -->
                        <?php endif;
                        
                        if( 'excerpt' == $post_content ) {
                            $more_tag_post = strpos(get_the_content(), '(more...)');
                            if( false === $more_tag_post ) {
                                $more = '<div class="more-section"><a class="more-link" href="' . get_permalink(get_the_ID()) . '">
                                        Read more &rarr;</a></div>';
                                echo wp_trim_words(get_the_content(), 40, $more);
                            } else {
                                the_content( __( '<div class="more-section">Read more <span class="meta-nav">&rarr;</span></div>', 'twentytwelve' ) ); 
                            } 
                        } ?>
                     <div class="clear"></div>       
		</div><!-- .entry-content -->

	</article><!-- #post -->
