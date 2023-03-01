<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	<div class="section">
	<div class="container">
	<div class="row">
	<div class="col-md-12 pagin">


	<?php
	do_action( 'woocommerce_before_shop_loop' );
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
	</div>
	</div>
	</div>
	</div>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	?>

	<?php

	woocommerce_product_loop_start();
	woocommerce_get_sidebar();
	?>
	<div id="store" class="col-md-9">
				<div class="row">
					<?
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {

				the_post();
			

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );
			?>
			<div class="col-md-4 col-xs-6">
				<div class="product">
			<?php
			wc_get_template_part( 'content', 'product' );
			?>
			</div>
		</div>
		<?php
		}

	}?>

				</div>
	</div>

<?php
	woocommerce_product_loop_end();
	?>
	<div class="section" id="breadcrumb">
	<div class="container">
	<div class="row">
	<div class="col-md-12 pagin">
		<div class="store-pagination">
	<?php
	woocommerce_pagination();
	?>
	</div>
</div>
</div>
</div>
</div>
<?php
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	// do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	?>
	<div class="store-pagination">
	<?php
	do_action( 'woocommerce_no_products_found' );
	?>
	</div>
	<?php
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
