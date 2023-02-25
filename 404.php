<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package autozone
 */

get_header();
?>
	<div class="section">
		<div class="container">
		<main id="primary" class="site-main">

<section class="error-404 not-found">

	<header class="page-header">
		<div class="displayed" style=" display: block; margin-left: 41%;
  margin-right: auto;
  margin-bottom: 50px;">
	<a href="<?php echo home_url('/') ?>" >
		<img  src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('az_404_img')); ?>"
		alt="">
	</a>
	</div>
		<h1 class="page-title"><?php esc_html_e( 'Упс! Такої сторінки немає, або вона тимчасово не працює', 'autozone' ); ?></h1>
	</header><!-- .page-header -->
	

	</div><!-- .page-content -->
</section><!-- .error-404 -->

</main><!-- #main -->
		</div>
	</div>
	

<?php
get_footer();
