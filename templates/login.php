<?php
/*
Template Name: Авторизация
*/
if(is_user_logged_in()){
    wp_redirect('my-account');
}else{
get_header();
get_template_part('woocommerce/includes/parts/wc-form', 'login');
get_footer();
}
?>

