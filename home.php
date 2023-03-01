<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package autozone
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
						<?php get_sidebar();?>
				
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="row">

						<?php

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 20
						);
						$loop = new WP_Query($args);
						if ($loop->have_posts()) {
							while ($loop->have_posts()) : $loop->the_post();
						?>
								<div class="col-md-3 col-xs-6">
									<div class="product">
										<?php wc_get_template_part('content', 'product'); ?>
									</div>
								</div>
						<?php

							endwhile;
						} else {
							get_template_part('template-parts/content', 'none');
						}
						wp_reset_postdata();


						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main><!-- #main -->
<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
	
				<div class="newsletter">
					<form>
					<a class="btn-more" href="<?php echo home_url('/shop');?>">
					Більше товарів
					</a>
					</form>
					<ul class="newsletter-follow">
						<?php if ($GLOBALS['autozone']['facebook']) : ?>
							<li>
								<a href="<?php echo $GLOBALS['autozone']['facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
							</li>
						<?php endif; ?>
						<?php if ($GLOBALS['autozone']['twitter']) : ?>
							<li>
								<a href="<?php echo $GLOBALS['autozone']['twitter']; ?>"><i class="fa-brands fa-twitter"></i></a>
							</li>
						<?php endif; ?>
						<?php if ($GLOBALS['autozone']['instagram']) : ?>
							<li>
								<a href="<?php echo $GLOBALS['autozone']['instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->
<?php
get_footer();
