<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<?php wp_head();
	$path = get_template_directory_uri() . "/assets";
	$current_user = wp_get_current_user();
	?>
</head>

<body>

	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<?php if ($GLOBALS['autozone']['phone']) : ?>
						<li><a href="#"><i class="fa fa-phone"></i>
								<?php echo $GLOBALS['autozone']['phone']; ?>
							</a></li>
					<?php endif; ?>
					<?php if ($GLOBALS['autozone']['email']) : ?>
						<li><a href="#"><i class="fa fa-envelope-o"></i>
								<?php echo $GLOBALS['autozone']['email']; ?>
							</a></li>
					<?php endif; ?>
					<?php if ($GLOBALS['autozone']['address']) : ?>
						<li><a href="#"><i class="fa fa-map-marker"></i>
								<?php echo $GLOBALS['autozone']['address']; ?>
							</a></li>
					<?php endif; ?>
				</ul>
				<ul class="header-links pull-right">

					<?php if (is_user_logged_in()) : ?>
						<li><a href="<?php echo home_url('my-account') ?>"><i class="fa fa-user-o"></i>
								<?php echo $current_user->user_login; ?>
							</a></li>
					<?php else : ?>
						<li><a href="<?php echo home_url('?page_id=2') ?>"><i class="fa fa-user-o"></i>My account</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<?php if (is_home() && is_front_page()) : ?>
								<a href="" class="logo">
									<img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('az_logo'), '70:169'); ?>" alt="">
								</a>
							<?php else : ?>
								<a href="<?php echo home_url('/') ?>" class="logo">
									<img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('az_logo'), '70:169'); ?>" alt="">
								</a>
							<?php endif; ?>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header_search">
							<form>

								<input value="<?php get_search_query(); ?>" name="s" class="input" placeholder="Search">

								<button class="search-btn">Search</button>
							</form>
							<div class="search-result-close">
								<i class="fa-sharp fa-solid fa-xmark"></i>
							</div>
							<div class="search-result"></div>
						</div>
					</div>

					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->

							<!-- /Wishlist -->
							<!-- /Cart -->
							<div class="site-header-cart">
								<?php autozone_woocommerce_cart_link(); ?>

								<div class="cart-list">
									<?php the_widget('WC_Widget_Cart', 'title='); ?>
								</div>
							</div>


							<!-- Cart -->


							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav class="header_menu" id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<?php if (is_user_logged_in()) {
				wp_nav_menu([
					'theme_location' => 'menu_main_header_for_auth',
					'container' => 'div',
					'menu_class' => 'top_nav_menu',
					'container_id' => 'responsive-nav',
					'menu_class' => 'main-nav nav navbar-nav'
				]);
			} else {
				wp_nav_menu([
					'theme_location' => 'menu_main_header',
					'container' => 'div',
					'menu_class' => 'top_nav_menu',
					'container_id' => 'responsive-nav',
					'menu_class' => 'main-nav nav navbar-nav'
				]);
			}

			?>
		</div>
		<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->