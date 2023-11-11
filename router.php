<?php
    require_once 'config.php';
    require_once './libs/router.php';
    require_once 'apps/api/controllers/ApiCategoriesController.php';

    //resourse= parametro + verbo;
    //Creo el router;
    $router = new Router();

    //Defino mi tabla de ruteo;

    //Endpoints
    //endponit para traer mi listado de categorias
    //                 endpoint     verbo       desde donde llamo   motodo
    //Listo mis categorias
    $router->addRoute('categories', 'GET', 'ApiCategoriesController', 'getCategories'   );

    //Listo mis libros por categoria
    $router->addRoute('categories/:ID', 'GET', 'ApiCategoriesController', 'getCategories'   ); //PARAMETRO

    //Elimino categoria
    $router->addRoute('categories/:ID', 'DELETE', 'ApiCategoriesController', 'delete'   ); //PARAMETRO

    // Agregar categoría - POST envio datos a la API para su procesamiento
    $router->addRoute('categories', 'POST', 'ApiCategoriesController', 'create');

    // Actualizar categoría - PUT actualizo datos existentes
    $router->addRoute('categories/:ID', 'PUT', 'ApiCategoriesController', 'updateCategoria'); 

    //Ordenamiento de manera asendente las categorias
    $router->addRoute('categoriesOrder/:order', 'GET', 'ApiCategoriesController', 'getOrderedCategories');

    //Filtrado por letra de categoria - http://localhost/REST/original/tpe-web2/api/categoriesFilter/c
    $router->addRoute('categoriesFilter/:letter', 'GET', 'ApiCategoriesController', 'getFilterCategories');

    //recurso/action    +    metodo con el q llamo/get/post/delete
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);