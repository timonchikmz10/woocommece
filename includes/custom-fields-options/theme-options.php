<?php
if( ! defined('ABSPATH')){
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'Настройки темы' )
        ->set_icon('dashicons-carrot')
        ->add_tab( 'Шапка' , array(
            Field::make( 'image', 'az_logo', 'Логотип' ),
        ) )
        ->add_tab( 'Подвал' , array(
            Field::make( 'text', 'az_about_us', 'О нас в футер ( < 100 символов)' ),

        ) )
        ->add_tab( 'Контакты' , array(
            Field::make( 'text', 'az_facebook_link' ),
            Field::make( 'text', 'az_twitter_link' ),
            Field::make( 'text', 'az_instagram_link' ),
            Field::make( 'text', 'az_phone' ),
            Field::make( 'text', 'az_email' ),
            Field::make( 'text', 'az_address' ),
        ) )
        ->add_tab('404', array(
            Field::make( 'image', 'az_404_img', 'Иконка ошибки'),
        ) );
