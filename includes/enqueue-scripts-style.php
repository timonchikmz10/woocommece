<?php
if( ! defined('ABSPATH')){
    exit;
}

add_action( 'wp_enqueue_scripts', 'autozone_scripts' );

function autozone_scripts() {
	$version = '0.0.0.0';
    $path = get_template_directory_uri();
    // wp_dequeue_style( 'wp-block-library' );
    // wp_dequeue_style( 'global-styles' );
    // wp_dequeue_style( 'classic-theme-styles' );

    // GOOGLE-FONTS
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,700', array(), $version );

    // BOOTSTRAP
    wp_enqueue_style('bootstrap', "{$path}/assets/css/bootstrap.min.css", array(), $version);
    // SLICK
    wp_enqueue_style('slick', "{$path}/assets/css/slick.css", array(), $version);
    wp_enqueue_style('slick-theme', "{$path}/assets/css/slick-theme.css", array(), $version);
    // NOUISLIDER
    wp_enqueue_style('slider', "{$path}/assets/css/nouislider.min.css", array(), $version);
    // FONT AWESOME ICON
    wp_enqueue_style('icon', "{$path}/assets/css/font-awesome.min.css", array(), $version);
    //  CUSTOM STYLESHEET
    wp_enqueue_style('style', "{$path}/assets/css/style.css", array(), $version);
    wp_enqueue_style('all-min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">', array(), $version );
    // SCRIPTS
    wp_enqueue_script('jquery', "{$path}/assets/js/jquery.min.js", array(), $version, true);
    wp_enqueue_script('bootstrapjs', "{$path}/assets/js/bootstrap.min.js", array(), $version, true);
    wp_enqueue_script('slick', "{$path}/assets/js/slick.min.js", array(), $version, true);
    wp_enqueue_script('nouislider', "{$path}/assets/js/nouislider.min.js", array(), $version, true);
    wp_enqueue_script('jqzoom', "{$path}/assets/js/jquery.zoom.min.js", array(), $version, true);
    wp_enqueue_script('main', "{$path}/assets/js/main.js", array(), $version, true);
    wp_enqueue_script('ajax-search', "{$path}/assets/js/ajax-search.js", array(), $version, true);
    wp_localize_script( 'ajax-search', 'header_search', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce( 'search-nonce' ),
    ) );
    


	wp_enqueue_style( 'autozone-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'autozone-style', 'rtl', 'replace' );
	wp_enqueue_script( 'autozone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

