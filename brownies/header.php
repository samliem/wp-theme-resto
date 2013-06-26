<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php do_action( 'theme_meta' ); ?>
<?php do_action( 'theme_font' ); ?> <!-- font links -->
<?php do_action( 'theme_links' ); ?> <!-- favicon, pingback, profile link -->

<?php if( is_home() || is_front_page() ) : ?>
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/home.css" rel="stylesheet" />
    <?php wp_enqueue_script('slider', get_stylesheet_directory_uri() . '/js/slider.js', array('jquery'));
endif; ?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action('jrl_before_header'); ?>
    <div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
            <hgroup>
                <?php global $jrl_theme_options; ?>
		<h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <?php 
                            if( 'text'== $jrl_theme_options['logo_type'] ) {
                                $title_words = explode( " ", $jrl_theme_options['site_title'] );
                                if( count($title_words) > 1 ) {
                                    echo '<span class="first-title-word">' . $title_words[0] . '</span>';
                                    for( $i=1; $i < count($title_words); $i++ ) {
                                        echo '&nbsp;' . $title_words[$i];
                                    }
                                } else {
                                    echo $title_words;
                                }
                            } else { ?>
                                <img src="<?php echo $jrl_theme_options['logo_image_url']; ?>" />
                            <?php }
                        ?>
                    </a>
                </h1>
                <h2 class="site-description">
                    <?php if( 'text' == $jrl_theme_options['logo_type'] && 
                         !empty($jrl_theme_options['site_description']) ) echo $jrl_theme_options['site_description']; ?>
                </h2>
                </hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                </nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->
        
        <div id="main" class="wrapper">