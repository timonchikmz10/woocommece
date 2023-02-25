<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'autozone_add_breadcrumbs', 20);
function autozone_add_breadcrumbs()
{
?>
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<?php woocommerce_breadcrumb(); ?>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<?php
}
add_action('woocommerce_before_single_product', 'autozone_wrapper_product_start', 5);
function autozone_wrapper_product_start()
{
?>
	<div class="single-section">
		<div class="container">
			<div class="row">
			<?php
		}
		add_action('woocommerce_after_single_product', 'autozone_wrapper_product_end', 5);
		function autozone_wrapper_product_end()
		{
			?>
			</div>
		</div>
	</div>
<?php
		}

		add_action('woocommerce_before_single_product_summary', 'autozone_wrapper_product_image_start', 5);
		function autozone_wrapper_product_image_start()
		{
?>
	<div class="col-md-6 col-md-push-2">
		<div id="product-main-img">
		<?php

			woocommerce_show_product_images();
		}
		add_action('woocommerce_before_single_product_summary', 'autozone_wrapper_product_image_end', 20);
		function autozone_wrapper_product_image_end()
		{
		?>

		</div>
	</div>
<?php
		}
		remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
		remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 10);
		add_action('woocommerce_before_single_product_summary', 'autozone_show_product_thumbnails', 20);
		function autozone_show_product_thumbnails()
		{
?>
	<div class="col-md-2  col-md-pull-6">
		<div id="product-imgs">
			<?php

			woocommerce_show_product_thumbnails();
			?>
		</div>
	</div>
<?php
		}
		add_action('woocommerce_before_single_product_summary', 'autozone_wrapper_product_entry_start', 30);
		function autozone_wrapper_product_entry_start()
		{
?>
	<div class="col-md-4 ">
		<div class="product-details">
		<?php
		}
		add_action('woocommerce_after_single_product_summary', 'autozone_wrapper_product_entry_end', 5);
		function autozone_wrapper_product_entry_end()
		{
		?>
		</div>
	</div>
	<div class="clearfix"> </div>
<?php
		}

		function autozone_woocommerce_scripts()
		{
			wp_enqueue_style('autozone-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

			$font_path   = WC()->plugin_url() . '/assets/fonts/';
			$inline_font = '@font-face {
							font-family: "star";
							src: url("' . $font_path . 'star.eot");
							src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
								url("' . $font_path . 'star.woff") format("woff"),
								url("' . $font_path . 'star.ttf") format("truetype"),
								url("' . $font_path . 'star.svg#star") format("svg");
							font-weight: normal;
							font-style: normal;
						}';

			wp_add_inline_style('autozone-woocommerce-style', $inline_font);
		}
		add_action('wp_enqueue_scripts', 'autozone_woocommerce_scripts');
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
		add_action('woocommerce_after_single_product_summary', 'autozone_output_related_products', 20);
		function autozone_output_related_products() {
			global $product;
			$args = array(
				'posts_per_page' => 4,
				'columns'        => 4,
				'orderby'        => 'rand', // @codingStandardsIgnoreLine.
				'order'          => 'desc',
			);
			$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

		// Handle orderby.
		$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

		// Set global loop values.
		wc_set_loop_prop( 'name', 'related' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );

		wc_get_template( 'single-product/related.php', $args );
			}