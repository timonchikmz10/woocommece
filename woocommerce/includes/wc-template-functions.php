<?php
/**
 * WooCommerce Template
 *
 * Functions for the templating system.
 *
 * @package  WooCommerce\Functions
 * @version  2.5.0
 */

use Automattic\Jetpack\Constants;

defined( 'ABSPATH' ) || exit;

/**
 * Handle redirects before content is output - hooked into template_redirect so is_page works.
 */
if ( ! function_exists( 'woocommerce_output_related_products' ) ) {

	/**
	 * Output the related products.
	 */
	function woocommerce_output_related_products() {

		$args = array(
			'posts_per_page' => 4,
			'columns'        => 4,
			'orderby'        => 'rand', // @codingStandardsIgnoreLine.
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	}
}
if ( ! function_exists( 'woocommerce_related_products' ) ) {

	/**
	 * Output the related products.
	 *
	 * @param array $args Provided arguments.
	 */
	function woocommerce_related_products( $args = array() ) {
		global $product;

		if ( ! $product ) {
			return;
		}

		$defaults = array(
	
		);

		$args = wp_parse_args( $args, $defaults );

		// Get visible related products then sort them at random.
		$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

		// Handle orderby.
		$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

		// Set global loop values.
		wc_set_loop_prop( 'name', 'related' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );

		wc_get_template( 'single-product/related.php', $args );
	}
}