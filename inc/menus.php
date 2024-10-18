<?php
// Archivo: inc/menus.php

function register_custom_menus()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu'),
        'footer_menu' => __('Footer Menu'),
        'header_menu' => __('Header Menu'), // Nuevo menú
        'sidebar_menu' => __('Sidebar Menu'), // Otro menú
    ));
}
add_action('init', 'register_custom_menus');
