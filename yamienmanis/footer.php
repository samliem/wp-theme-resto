<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
            <div id="footer-border"></div>
            <div class="site-info">
                Copyright &copy;<?php echo date('Y'); ?> 
                <a href="<?php home_url(); ?>">
                    <?php global $jrl_theme_options;
                    if( !empty($jrl_theme_options['resto']) ) {
                        echo $jrl_theme_options['resto'];
                    } else {
                        bloginfo('name'); 
                    } ?> 
                </a>
            </div><!-- .site-info 
            --><div class="resto-info">
            <?php
                
                if( !empty($jrl_theme_options['address1']) ) {
                    echo $jrl_theme_options['address1'];
                }
                
            ?>
            </div><!-- resto info
            --><div class="social">
            <?php
                if( !empty($jrl_theme_options['facebook']) ) : ?>
                    <a href="<?php echo $jrl_theme_options['facebook'];?>"> 
                       <img class="social-icon" src="<?php echo get_stylesheet_directory_uri() . '/images/facebook.png';?>" />
                    </a>
                <?php endif;
                
                if( !empty($jrl_theme_options['twitter']) ) : ?>
                    <a href="<?php echo $jrl_theme_options['twitter'];?>"> 
                       <img class="social-icon" src="<?php echo get_stylesheet_directory_uri() . '/images/twitter.png';?>" />
                    </a>
                <?php endif;
            ?>
            </div><!-- social links -->
        </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>