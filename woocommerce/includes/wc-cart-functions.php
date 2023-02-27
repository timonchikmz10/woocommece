<?php

use Automattic\Jetpack\Constants;

defined( 'ABSPATH' ) || exit;



function wc_add_to_cart_message( $products, $show_qty = false, $return = false ) {
	$titles = array();
	$count  = 0;

	if ( ! is_array( $products ) ) {
		$products = array( $products => 1 );
		$show_qty = false;
	}

	if ( ! $show_qty ) {
		$products = array_fill_keys( array_keys( $products ), 1 );
	}

	foreach ( $products as $product_id => $qty ) {
		/* translators: %s: product name */
		$titles[] = apply_filters( 'woocommerce_add_to_cart_qty_html', ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ), $product_id ) . apply_filters( 'woocommerce_add_to_cart_item_name_in_quotes', sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce' ), strip_tags( get_the_title( $product_id ) ) ), $product_id );
		$count   += $qty;
	}

	$titles = array_filter( $titles );
	/* translators: %s: product name */
	$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'woocommerce' ), wc_format_list_of_items( $titles ) );

	// Output success messages.
	$wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
	if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
		$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
		$message   = sprintf( '<a href="%s" tabindex="1" class="button wc-forward%s">%s</a> %s', esc_url( $return_to ), esc_attr( $wp_button_class ), esc_html__( 'Continue shopping', 'woocommerce' ), esc_html( $added_text ) );
	} else {
		$message = sprintf( '<a href="%s" tabindex="1" class="button wc-forward%s">%s</a> %s', esc_url( wc_get_cart_url() ), esc_attr( $wp_button_class ), esc_html__( 'View cart', 'woocommerce' ), esc_html( $added_text ) );
	}

	if ( has_filter( 'wc_add_to_cart_message' ) ) {
		wc_deprecated_function( 'The wc_add_to_cart_message filter', '3.0', 'wc_add_to_cart_message_html' );
		$message = apply_filters( 'wc_add_to_cart_message', $message, $product_id );
	}

	$message = apply_filters( 'wc_add_to_cart_message_html', $message, $products, $show_qty );

	if ( $return ) {
		return $message;
	} else {
		wc_add_notice( $message, apply_filters( 'woocommerce_add_to_cart_notice_type', 'success' ) );
	}
}