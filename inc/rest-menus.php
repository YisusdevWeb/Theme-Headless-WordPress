<?php
// Archivo: inc/custom-rest-menus.php
function get_menu_items($data)
{
    $menu_name = sanitize_text_field($data['menu']);
    $menu_locations = get_nav_menu_locations(); // Obtener las ubicaciones de menús



    // Verificar si el menú solicitado existe en las ubicaciones
    if (!in_array($menu_name, array_keys($menu_locations))) {
        return new WP_Error('invalid_menu', 'Invalid menu name', array('status' => 400));
    }

    // Si el menú existe, proceder a obtener sus elementos
    $menu_id = $menu_locations[$menu_name];
    $menu_items = wp_get_nav_menu_items($menu_id);


    // Crear un array para almacenar los elementos del menú
    $menu = array();
    // Crear un array para almacenar los elementos por ID
    $items_by_id = array();

    // Construir un array de elementos del menú indexados por ID
    foreach ($menu_items as $item) {
        $items_by_id[$item->ID] = array(
            'id' => $item->ID,
            'title' => $item->title,
            'url' => $item->url,
            'menu_order' => $item->menu_order,
            'parent_id' => $item->menu_item_parent,
        );
    }

    // Organizar los elementos en una estructura jerárquica
    foreach ($items_by_id as $item) {
        if ($item['parent_id'] == 0) {
            // Si es un elemento de nivel superior, lo agregamos al menú
            $menu[$item['id']] = array_merge($item, array('children' => array()));
        } else {
            // Si es un subelemento, lo agregamos a su padre
            $menu[$item['parent_id']]['children'][] = $item;
        }
    }

    return array_values($menu); // Retornar el menú como un array de valores
}



// Agregar el nuevo endpoint para obtener los elementos del menú

add_action('rest_api_init', function () {
    register_rest_route('headless/v1', '/menu/(?P<menu>[a-zA-Z0-9-_]+)', array(
        'methods' => 'GET',
        'callback' => 'get_menu_items',
    ));
});
