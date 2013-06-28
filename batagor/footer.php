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
            <div class="site-info">
            <?php global $jrl_theme_options;
                if( !empty($jrl_theme_options['resto']) ) {
                    echo '<h3 class="resto-name">' . $jrl_theme_options['resto'] . '</h3>';
                } else {
                    echo  '<h3 class="resto-name">' .  bloginfo('name') . '</h3>'; 
                } 
                
                if( !empty($jrl_theme_options['address1']) ) {
                    echo '<div>' . $jrl_theme_options['address1'] . '</div>';
                }
                
                if( !empty($jrl_theme_options['address2']) ) {
                    echo '<div>' . $jrl_theme_options['address2'] . '</div>';
                }
                
                if( !empty($jrl_theme_options['address3']) ) {
                    echo '<div>' . $jrl_theme_options['address3'] . '</div>';
                }
                
                ?>
            </div><!-- site-info 
            --><div class="resto-info">
                <div>
                    <?php
                    if ( !empty($jrl_theme_options['delivery']) ) {
                        echo 'Delivery : ' . $jrl_theme_options['delivery']; 
                    } ?>
                </div>
                <div>
                    <?php
                    if( !empty($jrl_theme_options['phone']) ) {
                        echo 'Ph: ' . $jrl_theme_options['phone'];
                    } ?>
                </div>
                <div>
                    <?php
                    if( !empty($jrl_theme_options['bbm']) ) {
                        echo 'Pin BB: ' . $jrl_theme_options['bbm'];
                    } ?>
                </div>
            </div><!-- resto-info
            --><div class="widget-footer">
                <?php 
                if( function_exists('dynamic_sidebar') && is_active_sidebar('sidebar-4') ) : ?>
                    <!--<div id="secondary" class="widget-area" role="complementary">-->
                        <?php dynamic_sidebar('sidebar-4'); ?>
                    <!--</div>-->
                <?php endif; ?>
            </div><!-- ym -->
        </footer><!-- #colophon -->
        <div id="copyright">
            Copyright &copy;<?php echo date('Y'); ?>
            <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>