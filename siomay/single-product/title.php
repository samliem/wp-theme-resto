<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div itemprop="name" class="product_title entry-title">
    <div class="bg-title-right">
        <div class="bg-title-mid">
            <?php the_title(); ?>
        </div>
    </div>
</div>