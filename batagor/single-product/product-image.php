<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                        $image_meta             = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
			$image_link  		= $image_meta[0];
                        $image_width            = $image_meta[1];
                        $image_height           = $image_meta[2];
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', 
                            sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" width="%d" height="%d" title="%s"  rel="prettyPhoto' . $gallery . '">%s</a>', 
                            $image_link, $image_width, $image_height, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
