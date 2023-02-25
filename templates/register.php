<?php
/*
Template Name: Регистрация
*/
if(is_user_logged_in()){
    wp_redirect('my-account');
}else{
get_header();
get_template_part('woocommerce/includes/parts/wc-form', 'register');
get_footer();
}
?>