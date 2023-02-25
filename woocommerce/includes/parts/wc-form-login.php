<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 ?>



<div class="section">
<div class="container">
  <div class="row">
  <?php do_action( 'woocommerce_before_customer_login_form' ); ?>
    <div class="col-md-offset-3 col-md-6">
      
      <form class="woocommerce-form woocommerce-form-login login register form-horizontal"  method="post">
      <span class="heading"><?php esc_html_e( 'Авторизация', 'woocommerce' ); ?></span>
        <?php do_action( 'woocommerce_login_form_start' ); ?>  
          <div class="form-group">
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
              <input  type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>
          </div>
          <div class="form-group help">
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
              <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
            </p>
          </div>
          <?php do_action( 'woocommerce_login_form' ); ?>
          <div class="form-group">
            <div class="main-checkbox">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                <label for="checkbox"></label>
            </div>
                <span class="text"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
          </div>
          <div class="form-group">
          <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			        	<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                </div>

                <p class="woocommerce-LostPassword lost_password">
				      <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			      </p>
          
          <?php wc_print_notices(); ?>
          <?php do_action( 'woocommerce_login_form_end' ); ?>
      </form>
    </div>
  </div>
</div>
</div>
<?php do_action('woocommerce_before_customer_login_form');?>
