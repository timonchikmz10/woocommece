<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.2.0
 */

defined( 'ABSPATH' ) || exit;
add_action( 'woocommerce_after_quantity_input_field', 'arendelle_quantity_plus_sign' ); 
function arendelle_quantity_plus_sign() {
	echo '<span class="quantity__button quantity__plus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>';
}
 
add_action( 'woocommerce_before_quantity_input_field', 'arendelle_quantity_minus_sign' );
function arendelle_quantity_minus_sign() {
	echo '<span class="quantity__button quantity__minus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>';
}

add_action( 'wp_footer', 'arendelle_quantity_plus_minus' ); 
function arendelle_quantity_plus_minus() {

   ?>
		<script type="text/javascript">
						
			jQuery(document).ready(function($) {   
					
				var forms = jQuery('.woocommerce-cart-form, form.cart');
						forms.find('.quantity.hidden').prev( '.quantity__button' ).hide();
						forms.find('.quantity.hidden').next( '.quantity__button' ).hide();

				$(document).on( 'click', 'form.cart .quantity__button, .woocommerce-cart-form .quantity__button', function() {

					var $this = $(this);					

					// Get current quantity values
					var qty = $this.closest( '.quantity' ).find( '.qty' );
					var val = ( qty.val() == '' ) ? 0 : parseFloat(qty.val());
					var max = parseFloat(qty.attr( 'max' ));
					var min = parseFloat(qty.attr( 'min' ));
					var step = parseFloat(qty.attr( 'step' ));

					// Change the value if plus or minus
					if ( $this.is( '.quantity__plus' ) ) {
						if ( max && ( max <= val ) ) {
							qty.val( max ).change();
						} 
						else {
							qty.val( val + step ).change();
						}
					} 
					else {
						if ( min && ( min >= val ) ) {
							qty.val( min ).change();
						} 
						else if ( val >= 1 ) {
							qty.val( val - step ).change();
						}
					}							
				});          
			});
						
		</script>
   <?php
}
/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

// In some cases we wish to display the quantity but not allow for it to be changed.
if ( $max_value && $min_value === $max_value ) {
	$is_readonly = true;
	$input_value = $min_value;
} else {
	$is_readonly = false;
}
?>
<div class="quantity">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action( 'woocommerce_before_quantity_input_field' );
	?>
	<div class="input-number">
	<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
	<input
		type="<?php echo $is_readonly ? 'text' : 'number'; ?>"
		<?php wp_readonly( $is_readonly ); ?>
		id="<?php echo esc_attr( $input_id ); ?>"
		class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
		name="<?php echo esc_attr( $input_name ); ?>"
		value="<?php echo esc_attr( $input_value ); ?>"
		title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
		size="4"
		min="<?php echo esc_attr( $min_value ); ?>"
		max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
		<?php if ( ! $is_readonly ): ?>
			step="<?php echo esc_attr( $step ); ?>"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
		<?php endif; ?>
	/>
		</div>
	<?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action( 'woocommerce_after_quantity_input_field' );
	?>
</div>
<?php
