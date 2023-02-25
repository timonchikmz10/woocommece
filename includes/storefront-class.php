<?php
/**
 * Storefront Class
 *
 * @author   WooThemes
 * @since    2.0.0
 * @package  autozone
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Autozone' ) ) :

	/**
	 * The main Storefront class
	 */
	class Storefront {

/**
 * @snippet       Edit Image Sizes @ Storefront Theme
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter( 'autozone_woocommerce_args', 'bbloomer_resize_storefront_images' );
 
function bbloomer_resize_storefront_images( $args ) {
   $args['single_image_width'] = 999;
   $args['thumbnail_image_width'] = 222;
   return $args;
}
}