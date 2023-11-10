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

    //                 endpoint              verbo       desde donde llamo       motodo
    //Listo mis categorias
    $router->addRoute('categories',         'GET',    'ApiCategoriesController', 'get'   );

    //Listo mis libros por categoria
    $router->addRoute('categories/:ID',     'GET',    'ApiCategoriesController', 'get'   );

    //Agrego libro //post para agregar
    $router->addRoute('categorias', 'POST', 'ApiCategorieController', 'createBook');

    //Actualizo libro //PUTpara actualizar
    //$router->addRoute('categorias/:ID/:ID',     'PUT',    'CategorieController', 'addBook'   ); // parametro

    //Elimino categoria y libro
    $router->addRoute('categories/:ID', 'DELETE', 'ApiCategoriesController', 'deleteItem');
    $router->addRoute('categories/:ID/:ID2', 'DELETE', 'ApiCategoriesController', 'deleteItem');

    // Agregar categoría - POST envio datos a la API para su procesamiento
    //$router->addRoute('categories', 'POST', 'ApiCategoriesController', 'create');
    $router->addRoute('categories/create', 'POST', 'ApiCategoriesController', 'createItem');
    $router->addRoute('categories/:ID/books/create', 'POST', 'ApiCategoriesController', 'createItem');

    // Actualizar categoría - PUT actualizo datos existentes
    $router->addRoute('categories/:ID', 'PUT', 'ApiCategoriesController', 'updateCategoria'); 

    // Login
    //$router->addRoute('login', 'GET', 'AuthController', 'showLogin');
    // Ruta GET para mostrar la página de inicio de sesión.

    // Signup
    //$router->addRoute('signup', 'GET', 'AuthController', 'showSignup');
    // Ruta GET para mostrar la página de registro de usuarios.


    //Registrar usuario
    //$router->addRoute('registro', 'POST', 'AuthController', 'registerUser');
    //Con el post estoy mandando un usuario a mi db


    //About
    //$router->addRoute('about', 'GET', 'AuthController', 'showAbout'); //preguntar

    //Auth
    //$router->addRoute('auth',     'PUT',    'AuthController', 'auth'   ); 

    //Log out
    //$router->addRoute('logOut', 'GET', 'AuthController', 'logOut');

    //Default
    //$router->addRoute('default',     'PUT',    'ErrorController', 'showError404'   ); 



    //Una vez q defini todas mis entradas en mi tabla de ruteo: route->paso mi recurso(resource, seria como el action) y obtengo el metodo con el q se esta llamando
            //recurso/action    +    metodo con el q llamo/get/post/delete
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);