<?php
/**
 * autozone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autozone
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

add_action( 'carbon_fields_register_fields', 'register_carbon_fields' );
function register_carbon_fields() {
    require_once('includes/custom-fields-options/theme-options.php');
	require_once('includes/custom-fields-options/metabox.php');
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

require_once get_template_directory() . '/includes/theme-settings.php';

require_once get_template_directory() . '/includes/widget-areas.php';
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.


 * Enqueue scripts and styles.
 */

require_once get_template_directory() . '/includes/ajax.php';

require_once get_template_directory() . '/includes/enqueue-scripts-style.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/woocommerce/includes/wc-cart-functions.php';
	require get_template_directory() . '/includes/woocommerce.php';
    require get_template_directory() . '/woocommerce/includes/wc-template-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
}

//Регистрация меню
add_action( 'after_setup_theme', 'theme_support' );
    function theme_support() {
    register_nav_menu( 'menu_main_header', 'Меню в шапке' );
    register_nav_menu( 'menu_main_header_for_auth', 'Меню в шапке для авторизованых пользователей(Без страницы логина и пароля)' );
    register_nav_menu( 'services_menu', 'Сервисы(Помощь, Корзина, Авторизация)');
    register_nav_menu( 'services_menu_for_auth', 'Сервисы для авторизованых пользователей (О нас, Помощь, Корзина, Мой аккаунт)');
    register_nav_menu( 'info_menu', 'Контакты, О нас...');
}

//RM
remove_action('admin_print_scripts',    'print_emoji_detection_script' );
remove_action('admin_print_styles',     'print_emoji_styles' );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( "wp_head", "wp_robots", 1 );
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links');     
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');


add_action('init', 'create_global_variable');
function create_global_variable(){
    global $autozone;
    $autozone =[
        'phone' => carbon_get_theme_option('az_phone'),
        'email' => carbon_get_theme_option('az_email'),
        'address' => carbon_get_theme_option('az_address'),
        'facebook' => carbon_get_theme_option('az_facebook_link'),
        'twitter' => carbon_get_theme_option('az_twitter_link'),
        'instagram' => carbon_get_theme_option('az_instagram_link'),
    ];
}
function quadlayers_woocommerce_button_proceed_to_checkout() { ?>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
    <?php esc_html_e( 'Please Move to Checkout Here', 'woocommerce' ); ?>
    </a>
    <?php
    }

/**
 * Check if WC_SCRIPT_in_wp_footer does not exists and is_product function exists.
 */
if( ! function_exists( 'WC_SCRIPT_in_wp_footer' ) && function_exists( 'is_product' ) ) {
    /**
     * Add script in the WP footer page.
     */
    function WC_SCRIPT_in_wp_footer() {
        if ( is_product() && ! wp_is_mobile() ) {
            ?>
            <script type="application/javascript">
                jQuery( 'div.woocommerce-product-gallery.images' ).on( 'click', 'div.flex-viewport figure' , function(){
                    jQuery( this ).closest( '.woocommerce-product-gallery' ).find( '.woocommerce-product-gallery__trigger' ).trigger( 'click' );
                });
            </script>
            <?php
        }
    }
}
add_action( 'wp_footer', 'WC_SCRIPT_in_wp_footer' );
add_theme_support(
    'woocommerce',
    array(
        'thumbnail_image_width' => 200,
        'thumbnail_image_height' => 200,
    )
);
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');