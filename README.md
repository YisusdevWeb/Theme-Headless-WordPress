# Tema Headless de WordPress

Este tema de WordPress está optimizado para su uso como **Headless**. A continuación, se describe cómo acceder a las rutas de la API REST para consultar los menús registrados.

## API REST: Rutas de Menús

Para acceder a los menús de WordPress a través de la API REST, utiliza la siguiente ruta:

GET https://tusitio.com/wp-json/headless/v1/menu/{name_menu}


### Parámetros:
- `{name_menu}`: Reemplaza este valor con el **slug** del menú que deseas consultar. Por ejemplo: `primary_menu`, `footer_menu`, etc.

### Ejemplo de Solicitud:
```bash
GET https://tusitio.com/wp-json/headless/v1/menu/primary_menu

[
    {
        "id": 1,
        "title": "Inicio",
        "url": "https://tusitio.com",
        "menu_order": 1,
        "parent_id": 0,
        "children": []
    },
    {
        "id": 2,
        "title": "Contacto",
        "url": "https://tusitio.com/contacto",
        "menu_order": 2,
        "parent_id": 0,
        "children": []
    }
]

{
    "code": "no_menu",
    "message": "Menu not found",
    "data": {
        "status": 404
    }
}

Requisitos:
WordPress con API REST habilitada.
Menús registrados en el tema con register_nav_menus().




---

### English Version:

```markdown
# WordPress Headless Theme

This WordPress theme is optimized for use as **Headless**. Below is a description of how to access the REST API routes to query registered menus.

## REST API: Menu Routes

To access WordPress menus via the REST API, use the following route:

GET https://yourwebsite.com/wp-json/headless/v1/menu/{name_menu}

### Parameters:
- `{name_menu}`: Replace this value with the **slug** of the menu you want to query. For example: `primary_menu`, `footer_menu`, etc.

### Example Request:
```bash
GET https://yourwebsite.com/wp-json/headless/v1/menu/primary_menu

[
    {
        "id": 1,
        "title": "Home",
        "url": "https://yourwebsite.com",
        "menu_order": 1,
        "parent_id": 0,
        "children": []
    },
    {
        "id": 2,
        "title": "Contact",
        "url": "https://yourwebsite.com/contact",
        "menu_order": 2,
        "parent_id": 0,
        "children": []
    }
]

{
    "code": "no_menu",
    "message": "Menu not found",
    "data": {
        "status": 404
    }
}

Requirements:
WordPress with REST API enabled.
Registered menus in the theme with register_nav_menus().