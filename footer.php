		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p><?php echo carbon_get_theme_option('az_about_us')?></p>
								<ul class="footer-links">
								<?php if($GLOBALS['autozone']['phone']):?>
									<li><a href="#"><i class="fa fa-phone"></i>	<?php echo $GLOBALS['autozone']['phone'];?></a></li>
								<?php endif;?>
								<?php if($GLOBALS['autozone']['email']):?>
									<li><a href="#"><i class="fa fa-envelope-o"></i> <?php echo $GLOBALS['autozone']['email'];?></a></li>
								<?php endif;?>
								<?php if($GLOBALS['autozone']['address']):?>
									<li><a href="#"><i class="fa fa-map-marker"></i> <?php echo $GLOBALS['autozone']['address'];?></a></li>
								<?php endif;?>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								
								<?php if ( is_user_logged_in() ) {
								wp_nav_menu( [
							'theme_location'  => 'menu_main_header_for_auth',
							'container'       => 'div',
							'container_id'	  => 'responsive-nav',
							'menu_class'	  => 'footer-links'
						] );
					}
					else {
						wp_nav_menu( [
							'theme_location'  => 'menu_main_header',
							'container'       => 'div',
							'container_id'	  => 'responsive-nav',
							'menu_class'	  => 'footer-links'
						] );
					}
						
						?>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<?php 
								wp_nav_menu( [
							'theme_location'  => 'info_menu',
							'container'       => 'div',
							'container_id'	  => 'responsive-nav',
							'menu_class'	  => 'footer-links'
						] );

						?>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<?php if ( is_user_logged_in() ) {
								wp_nav_menu( [
							'theme_location'  => 'services_menu_for_auth',
							'container'       => 'div',
							'container_id'	  => 'responsive-nav',
							'menu_class'	  => 'footer-links'
						] );
					}
					else {
						wp_nav_menu( [
							'theme_location'  => 'services_menu',
							'container'       => 'div',
							'container_id'	  => 'responsive-nav',
							'menu_class'	  => 'footer-links'
						] );
					}
						
						?>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a ><i class="fa-brands fa-cc-visa"></i></a></li>
								<li><a ><i class="fa fa-credit-card"></i></a></li>
								<li><a ><i class="fa-brands fa-cc-paypal"></i></a></li>
								<li><a ><i class="fa-brands fa-cc-mastercard"></i></a></li>
							
							</ul>

						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<?php wp_footer(); ?>

	</body>
</html>
