<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 ?>

<div class="section">
<div class="container">
  <div class="row">

    <div class="col-md-offset-3 col-md-6">
      <form method="post" class="woocommerce-form woocommerce-form-register register form-horizontal" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
        <span class="heading"><?php esc_html_e( 'Register', 'woocommerce' ); ?></span>
        <?php do_action( 'woocommerce_register_form_start' ); ?>
        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>  
          <div class="form-group">
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>
          </div>
        <?php endif; ?>
        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
            <div class="form-group">
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                  <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
              </p>
            </div>
        <?php endif; ?>
        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
            <div class="form-group help">
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" />
              </p>
            </div>
        <?php else : ?>

          <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

        <?php endif; ?>
            <?php do_action( 'woocommerce_register_form' ); ?>
            <div class="form-group">
              <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
              <button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </div> 
            <?php wc_print_notices(); ?>
            <?php do_action( 'woocommerce_register_form_end' ); ?>
        </form>
    </div>
  </div>
</div>
</div>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>


