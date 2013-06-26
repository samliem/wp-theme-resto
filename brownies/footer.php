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
        </div><!-- #page -->
        <?php global $jrl_theme_options;?>
  	<footer id="colophon" role="contentinfo">
            <div class="footer-top">
                <div class="site-wrap">
                    <div class="resto-name">
                        <?php if( !empty($jrl_theme_options['resto']) ) {
                        echo '<h3>' . $jrl_theme_options['resto'] . '</h3>';
                        } else {
                            echo  '<h3 class="resto-name">' .  bloginfo('name') . '</h3>'; 
                        } ?>
                    </div><!-- resto-name
                     --><div class="social-container">
                        <?php if( !empty($jrl_theme_options['facebook']) ) : ?>
                            <a href="<?php echo $jrl_theme_options['facebook'];?>" class="social"> 
                                <img class="social-icon" src="<?php echo get_stylesheet_directory_uri() . '/images/facebook.png';?>" />
                            </a>
                        <?php endif; 

                        if( !empty($jrl_theme_options['twitter']) ) : ?>
                            <a href="<?php echo $jrl_theme_options['twitter'];?>" class="social"> 
                                <img class="social-icon" src="<?php echo get_stylesheet_directory_uri() . '/images/twitter.png';?>" />
                            </a>
                        <?php endif; ?>
                    </div><!-- social-container
                     --><div class="resto-phone">
                        <?php if( !empty($jrl_theme_options['delivery']) ) : ?>
                            <div class="delivery">
                                <?php echo 'Delivery : ' . $jrl_theme_options['delivery']; ?>
                            </div>
                        <?php endif; ?>
                    </div><!-- resto-phone -->
                </div><!-- site-wrap -->
            </div><!-- footer-top -->
            <div class="site-wrap">
                <div class="resto-info">
                    <div>
                        <span>Informasi</span>&nbsp; Alamat
                    </div>
                    <?php
                    if( !empty($jrl_theme_options['address1']) ) {
                        echo '<div>' . $jrl_theme_options['address1'] . '</div>';
                    }

                    if( !empty($jrl_theme_options['address2']) ) {
                        echo '<div>' . $jrl_theme_options['address2'] . '</div>';
                    }

                    if( !empty($jrl_theme_options['address3']) ) {
                        echo '<div>' . $jrl_theme_options['address3'] . '</div>';
                    }
                    
                    if( !empty($jrl_theme_options['phone']) ) {
                        echo '<div> Phone : ' . $jrl_theme_options['phone'] . '</div>';
                    }
                    
                    if( !empty($jrl_theme_options['fax']) ) {
                        echo '<div> Fax. : ' . $jrl_theme_options['fax'] . '</div>';
                    }
                    
                    if( !empty($jrl_theme_options['bbm']) ) {
                        echo '<div>Pin BB : ' . $jrl_theme_options['bbm']. '</div>';
                    }

                    ?>
                </div><!-- site-info 
                --><div class="widget-footer">
                    <?php if( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-4') ) : 
                        dynamic_sidebar('sidebar-4'); 
                    endif; ?>
                </div><!-- resto-info
                --><div class="widget-footer">
                    <?php if( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-5') ) : 
                        dynamic_sidebar('sidebar-5'); 
                    endif; ?>
                </div><!-- ym -->
                <div id="copyright">
                    Copyright &copy;<?php echo date('Y'); ?>
                    <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a>
                </div>
            </div><!-- site-wrap -->

            
        </footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>