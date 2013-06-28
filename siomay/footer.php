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
        </div><!-- .site-wrapper -->
        
        <?php global $jrl_theme_options; ?>
        
        <div class="footer">
            
                <footer id="colophon" role="contentinfo">
                    <div class="site-wrap">
                    <div class="widget-footer resto-info">
                        <div class="resto-name">
                            <?php if( !empty($jrl_theme_options['resto']) ) {
                                echo '<h3 class="resto-name">' . $jrl_theme_options['resto'] . '</h3>';
                            } else {
                                    bloginfo('name'); 
                            } ?>
                        </div>

                        <?php if( !empty($jrl_theme_options['address1']) ) {
                            echo $jrl_theme_options['address1'];
                        }

                        if( !empty($jrl_theme_options['address2']) ) {
                            echo '<div>' . $jrl_theme_options['address2'] . '</div>';
                        }

                        if( !empty($jrl_theme_options['address3']) ) {
                            echo '<div>' . $jrl_theme_options['address3'] . '</div>';
                        }
                        
                        if( !empty($jrl_theme_options['delivery']) ) {
                            echo '<div>Delivery : ' . $jrl_theme_options['delivery'] . '</div>';
                        }
                        
                        if( !empty($jrl_theme_options['phone']) ) {
                            echo '<div>Phone : ' . $jrl_theme_options['phone'] . '</div>';
                        }
                        
                        if( !empty($jrl_theme_options['bbm']) ) {
                            echo '<div>Pin BB : ' . $jrl_theme_options['bbm'] . '</div>';
                        }
                        
                        if( !empty($jrl_theme_options['facebook']) ) {
                            echo '<div class="social">
                                <a href="' . $jrl_theme_options['facebook'] . '" title="follow my facebook">
                                <img src="' . get_stylesheet_directory_uri() . '/images/facebook.png" />
                                </a></div>';  
                        }
                        
                        if( !empty($jrl_theme_options['twitter']) ) {
                            echo '<div class="social">
                                <a href="' . $jrl_theme_options['twitter'] . '" title="follow my Twitter">
                                <img src="' . get_stylesheet_directory_uri() . '/images/twitter.png" />
                                </a></div>';  
                        }
                    
                        ?>
                    </div><!-- resto-info 
                    --><div class="widget-footer">
                        <?php 
                        if( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-4') ) : ?>
                            <?php dynamic_sidebar('sidebar-4'); ?>
                        <?php endif; ?>
                    </div><!-- widget-footer
                    --><div class="widget-footer">
                        <?php 
                        if( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-5') ) : ?>
                            <?php dynamic_sidebar('sidebar-5'); ?>
                        <?php endif; ?>
                    </div><!-- widget-footer -->
                                </div><!-- site-wrap -->

                </footer>
                <div id="copyright">
                    <div class="site-wrap">
                    Copyright &copy;<?php echo date('Y'); ?>
                    <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    </div>
                </div>
        </div>
            
    </div><!-- #page -->

    <?php wp_footer(); ?>
    </body>
</html>