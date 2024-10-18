
<?php
/*if(!defined('REDIRECT_URL')) {
    define("REDIRECT_URL", "http://localhost/wordpress/");
}
if(!function_exists('a_redirect')) {
    function a_redirect(){
    header("Location:".REDIRECT_URL);
    die();
}
}
if (!function_exists('a_theme_setup')) {
function a_theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'a_theme_setup');

}

*/
function headless_theme_setup()
{
    // Remover los scripts y estilos predeterminados de WordPress
    remove_action('wp_head', 'wp_enqueue_scripts');
}
add_action('after_setup_theme', 'headless_theme_setup');


require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/rest-menus.php';
