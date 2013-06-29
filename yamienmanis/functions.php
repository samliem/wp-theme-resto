<?php

    /*************************** Initialization ******************************/

    //require_once( 'wptuts-options/wptuts-options.php' );  
    require_once( 'theme-options/theme-options.php' );
    define( 'THEME_OPTION', 'jrl_resto_theme_options');
    $jrl_theme_options = get_option( THEME_OPTION );    //global variable
    
    //#mask digunakan sebagai dasar untuk popup window / lightbox
    function jrl_insert_mask() { ?>
        <div id="mask" class="hide">
            <div class="lightbox-container hide">
                <a href="#" id="lightbox-close" title="close">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/cancel.png'; ?>" />
                </a>
                <img class="lightbox-image" src="" />
            </div>
        </div><!-- #mask -->
    <?php } 
    add_action('jrl_before_header', 'jrl_insert_mask');
    
    /*************************************************************************/
    /******************************** head tag *******************************/
    
    function jrl_theme_font_link() {
        echo '<link href="http://fonts.tutorialwebsite.org/fonts.css" rel="stylesheet" type="text/css" />';
        echo '<link href="http://fonts.googleapis.com/css?family=PT+Sans|Righteous|Didact+Gothic"
                rel="stylesheet" type="text/css" />';
    }
    
    add_action( 'theme_font', 'jrl_theme_font_link', 30 );
    
    function jrl_theme_links() { ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php
            global $jrl_theme_options;
            if( !empty($jrl_theme_options['favicon']) ) : ?>
                <link rel="shortcut icon" href="<?php echo $jrl_theme_options['favicon']; ?>" 
                    type="image/x-icon" />
            <?php endif; 
    }
    
    add_action( 'theme_links', 'jrl_theme_links' );
    
    function jrl_theme_meta() { ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
    <?php }
    
    add_action( 'theme_meta', 'jrl_theme_meta' );
    
    /*************************************************************************/
    /************************ Cek Background Size ****************************/

    function check_bg() { 
        
        $jrl_theme_options = get_option( THEME_OPTION );
        
        if( $jrl_theme_options['background_size'] == 'cover' ) : ?>
            <style type="text/css">
                body.cover {
                    background-size: cover;
                    background-attachment: fixed; 
                    background-repeat: no-repeat;
                    background-position: center center;
                }
            </style>
    <?php endif;    
    
    }
    
    add_action( 'wp_head', 'check_bg', 20 );
    
    function theme_body_class($classes) {
        
        $jrl_theme_options = get_option( THEME_OPTION );
        
        if( $jrl_theme_options['background_size'] == 'cover' ) {
            $classes[] = 'cover';
        }
        
        return $classes;
    }
    
    add_filter( 'body_class', 'theme_body_class', 20, 2);
    
   /*************************************************************************/
   /************ Js untuk upload image menggunakan media upload *************/
    
    function jrl_image_uploader($hook) {
        if( 'appearance_page_resto-theme-setting' == $hook) {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
    }
    
    add_action('admin_enqueue_scripts', 'jrl_image_uploader');
    
    /*************************************************************************/
    /******************* REPLACE paging parent's function ********************/ 
    function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
                        <?php 
                            global $jrl_theme_options;
                            $paging_type = $jrl_theme_options['post_paging'];
                            if( $paging_type == 'pagination') : 
                                wp_enqueue_style('pagination', get_stylesheet_directory_uri() . '/css/pagination.css');
                                $big = 99999999;
                                echo paginate_links(array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) ) ),
                                    'current' => max(1, get_query_var('paged')),
                                    'prev_text' => '&laquo;',
                                    'next_text' => '&raquo;',
                                    'total' => $wp_query->max_num_pages
                                    )
                                );        
                            else: ?>
                                <div class="nav-previous alignleft">
                                    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?>
                                </div>
                                <div class="nav-next alignright">
                                    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                                </div>
                        <?php endif; ?>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
    }    
    
    /*************************************************************************/
    /****************************** WooCommerce ******************************/ 
    
    function mod_wc_template_add_to_cart() {
    
        /* untuk menghilangkan Add to Cart button, Read More, Select Option, dst
         * yang terdapat dalam template loop/add-to-cart.php karena informasi ini
         * tidak diperlukan untuk theme ini dan akan mengacau tampilan produk thumbnail
         */

        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    }
    add_action('after_setup_theme', 'mod_wc_template_add_to_cart');
    
    function custom_woocommerce_onsale_message($default_message) {
        $default_message = '<span class="onsale">'.__( 'Promo', 'woocommerce' ).'</span>';
        return $default_message;
    }
    
    add_filter('woocommerce_sale_flash', 'custom_woocommerce_onsale_message');
    
    function custom_woocommerce_page_title($page_title) {
        if( is_home() || is_front_page() ) {
            $page_title = '';
        }
        return $page_title;
    }
    
    add_filter('woocommerce_page_title', 'custom_woocommerce_page_title');
    
    /*
     * fungsi di bawah ini digunakan untuk menentukan 
     * maximal product yang ditampilkan per halaman
     */
    
    function set_wc_max_product_page() {
        global $jrl_theme_options;
        if( !empty($jrl_theme_options['max_product_page']) ) {
            $max_product = $jrl_theme_options['max_product_page'];
            add_filter( 'loop_shop_per_page', create_function( "$cols", "return $max_product;" ), 20 );
        }
    }
    
    add_action('init', 'set_wc_max_product_page');
    
    /*
     * fungsi di bawah ini dipanggil hook dalam header.php
     * untuk menghilangkan page title pada archive product
     * yang berfungsi sebagai home page
     */
    
    function hide_wc_page_title() {
        return false;
    }
    
    /*------------------------------------------------------
    ------------------- Product Thumbnail -----------------*/
   
    function set_column_product($num_of_columns) {
        global $jrl_theme_options;
        if( isset($jrl_theme_options['product_column']) && 
            !empty($jrl_theme_options['product_column']) ) {
            $num_of_columns = $jrl_theme_options['product_column'];
        }
        return $num_of_columns;
    }
    add_filter('loop_shop_columns', 'set_column_product');
       
    function register_custom_woocommerce_script() {
        wp_enqueue_script('custom-woocommerce-script', 
            get_stylesheet_directory_uri() . '/js/custom-woocommerce.js',
            array('jquery'));
        global $jrl_theme_options; 
        if( isset($jrl_theme_options['product_column']) && 
            !empty($jrl_theme_options['product_column']) ) {
            $num_of_columns = $jrl_theme_options['product_column'];
        } else {
            //woocommerce secara default menampilkan daftar product dalam 4 column
            $num_of_columns = 4;    
        }
        ?>
        <!--input di bawah ini digunakan untuk jQuery-->
        <input type="hidden" id="product-column" 
            value="<?php echo $jrl_theme_options['product_column']; ?>" />
    <?php }
    add_action('woocommerce_before_main_content', 'register_custom_woocommerce_script', 30);
    
    function insert_wc_loading_img() {
        echo '<div id="thumbnail-loading"><img src="' . get_stylesheet_directory_uri() . 
             '/images/load.gif"/></div>';
    }
    add_action('woocommerce_before_shop_loop', 'insert_wc_loading_img', 40);
    
    function insert_product_shortdescription() {
        global $product;
        $data_product = $product->get_post_data();
        echo '<div class="short-desc">' . strip_tags($data_product->post_excerpt) . '</div>';
    }
    add_action('woocommerce_after_shop_loop_item_title', 'insert_product_shortdescription', 5);
    
    /*------------------------------------------------------
    -------------------- Product Archive -----------------*/
    
    //Mengubah urutan rating agar berada di bawah harga
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );
    
    function custom_woocommerce_result_count($default_message, $total) {
        if( 1 == $total ) {
            $default_message = 'Menu Masakan';
        } else {
            $default_message = "Daftar Menu Masakan ( $total )";
        }
        return $default_message;
    }
    
    add_filter('result_count_message', 'custom_woocommerce_result_count', 10, 2);
    
    /*------------------------------------------------------
    -------------------- Single Product ------------------*/
    
    /*-- Mengganti Judul "Product Description" -- */
    function custom_wc_product_desc_heading($header_text) {
        $header_text = 'Keterangan Menu';
        return $header_text;
    }
    
    add_filter('woocommerce_product_description_heading', 'custom_wc_product_desc_heading');
    
    /*-- Mengganti judul Related Product 
     * Filter yang digunakan adalah custom filter yang
     * ditambahkan pada single-product/related.php
     * yang dicopy & dimodifikasi dalam theme
     */
    function custom_wc_related_product_heading($header_text) {
        $header_text = "Menu Menarik Lainnya";
        return $header_text;
    }
    
    add_filter('woocommerce_related_product_heading', 'custom_wc_related_product_heading');
    
    //lightbox untuk thumbnail pada single product -> line 398
    add_action('woocommerce_after_single_product', 'jrl_thumbnail_lightbox');
    
    //lightbox untuk product image thumbnails pada single product
    function custom_wc_single_product_thumbnail_html($html, $attachment_id, $post_id, $image_class){
        $image_html     = wp_get_attachment_image( $attachment_id, 'shop_thumbnail' );
        $image_title    = esc_attr( get_the_title( $attachment_id ) );
        $image_meta     = wp_get_attachment_image_src( $attachment_id, 'full');
        $image_link  	= $image_meta[0];
	$image_width    = $image_meta[1];
        $image_height   = $image_meta[2];
        
        $thumbnail_html = 
            sprintf('<a href="%s" class="%s" title="%s" width="%d" height="%d" rel="prettyPhoto[product-gallery]">%s</a>', 
                    $image_link, $image_class, $image_title, $image_width, $image_height, $image_html);
        
        return $thumbnail_html;
    }
    add_filter('woocommerce_single_product_image_thumbnail_html', 'custom_wc_single_product_thumbnail_html', 10, 4);
    
    /* Modify woocommerce_related_products -> tidak menggunakan parameter $posts_per_page
     * agar semua related product (based on category and tag) ditampilkan sekaligus
     * men-set lebar dari setiap thumbnail sesuai dengan jumlah related product
     */
    function woocommerce_related_products( $posts_per_page = 2, $columns = 2, $orderby = 'rand'  ) {
        global $product;
        if( $product->get_related() > 2 ) {
            $columns = 3; ?>
            <input type="hidden" id="product-column" 
            value="<?php echo $columns; ?>" />
        <?php }
	woocommerce_get_template( 'single-product/related.php', array(
            'orderby'    => $orderby,
            'columns'    => $columns
	) );
    }
    
    /*************************************************************************/
    /***************************** Custom Widget *****************************/    
    
    function jrl_custom_widget() {
        wp_enqueue_style('widget-style', get_stylesheet_directory_uri() . '/widgets/css/widget.css');
        
        require_once "widgets/ym.php";
        require_once "widgets/promo-banner.php";
        require_once "widgets/recent-promo.php";
        require_once "widgets/promo-categories.php";
        require_once "widgets/post-promo-categories.php";
        
        register_widget('jrl_YM_Widget');
        register_widget('jrl_Banner_Promo');
        register_widget('jrl_Recent_Promo');
        register_widget('jrl_Promo_Categories');
        register_widget('jrl_Post_Promo_Categories');
    }
    add_action('widgets_init', 'jrl_custom_widget');
    
    /*************************************************************************/
    /***************** Promo Custom Post Type and Taxonomy *******************/
    function jrl_register_promo_post_type() {
        
        $labels = array(
            'name'              => 'Promosi',
            'singular_name'     => 'Promosi',
            'menu_name'         => 'Promosi Resto',
            'all_items'         => 'Daftar Promosi',
            'add_new'           => 'Tambah Promosi',
            'add_new_item'      => 'Promosi Baru',
            'edit_item'         => 'Edit Promosi',
            'new_item'          => 'Promosi Baru',
            'view_item'         => 'Lihat Promosi',
            'search_items'      => 'Cari Promosi',
            'not_found'         => 'Promosi tidak ditemukan',
            'not_found_in_trash'=> 'Tidak ada promosi yang dihapus',
            'parent_item_colon' => 'parent item colon'
        );
        
        $supports = array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions');
        
        register_post_type('promosi',
                array(
                    'labels'                => $labels,
                    'public'                => true,
                    'exclude_from_search'   => false,
                    'menu_position'         => 5,
                    'supports'              => $supports,
                    'has_archive'           => true,
                    )
                );
                
        flush_rewrite_rules();

    }
    add_action( 'init', 'jrl_register_promo_post_type' );

    function jrl_register_promo_taxonomy() {
        
        global $wp_rewrite;
        
        $labels = 
            array(
                'name'                  => 'Kategori Promosi',
                'singular_name'         => 'Kategori Promosi',
                'menu_name'             => 'Kategori Promosi',
                'all_items'             => 'Daftar Kategori Promosi',
                'edit_item'             => 'Edit Kategori',
                'view_item'             => 'Lihat Kategori',
                'update_item'           => 'Update Kategori',
                'add_new_item'          => 'Tambah Kategori Baru',
                'new_item_name'         => 'Nama Kategori Baru',
                'parent_item'           => 'Induk Kategori',
                'parent_item_colon'     => 'Induk Kategori colon',
                'search_items'          => 'Cari Kategori Promosi',
                'popular_items'         => 'Populer Kategori Promosi',
                'add_remove_items'      => 'Tambah / Hapus Kategori',
                'choose_from_most_used' => 'Pilih Dari yang Banyak Digunakan',
                'not_found'             => 'Kategori Tidak Ditemukan',
        );

        $args = 
            array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'sort'              => true,
            );

        register_taxonomy( 'kategori-promosi', array( 'promosi' ), $args );
        $wp_rewrite->flush_rules();
        
    }
    add_action( 'init', 'jrl_register_promo_taxonomy' );
    
    function jrl_thumbnail_lightbox() {
        wp_enqueue_script( 'thumbnail', get_stylesheet_directory_uri() . '/js/thumbnail-lightbox.js', array('jquery') ); 
    }
    add_action('jrl_before_single_promo', 'jrl_thumbnail_lightbox');
?>