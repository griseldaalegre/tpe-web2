<?php
    require_once 'config.php';
    require_once 'libs/router.php';
    require_once 'apps/controllers/ApiCategoriesController.php';



    //resourse= parametro + verbo;
    //Creo el router;
    $router = new Router();

    //Defino mi tabla de ruteo;

    //Endpoints
    //endponit para traer mi listado de categorias
    //                 endpoint     verbo       desde donde llamo   motodo
    //Listo mis categorias
    $router->addRoute('categories',         'GET',    'ApiCategoriesController', 'get'   );

    //Listo mis libros por categoria
    $router->addRoute('categories/:ID',     'GET',    'ApiCategoriesController', 'get'   ); //PARAMETRO

    //Elimino libro
    //$router->addRoute('categorias/:ID/:ID',     'DELETE',    'CategorieController', 'removeBook'   ); //PARAMETRO

    //Agrego libro //post para agregar
    //$router->addRoute('categorias/:ID/:ID', 'POST', 'CategorieController', 'addBook');

    //Actualizo libro //PUTpara actualizar
    //$router->addRoute('categorias/:ID/:ID',     'PUT',    'CategorieController', 'addBook'   ); // parametro

    //Edito libro //PUT para editar
    //$router->addRoute('categorias/:ID/:ID',     'PUT',    'CategorieController', 'editBook'   ); //PARAMETRO

    //Elimino categoria
    //$router->addRoute('categorias/:ID/',     'DELETE',    'CategoriesController', 'removeCategorie'   ); //PARAMETRO

    //Agrego categoria
    //$router->addRoute('categorias',     'POST',    'CategoriesController', 'addCategorie'   ); 

    //Atualizo categoria
    //$router->addRoute('categorias/:ID/',     'PUT',    'CategorieController', 'updateCategorie'   ); //PARAMETRO

    //Edito categoria
    //$router->addRoute('categorias/:ID',     'PUT',    'CategorieController', 'editCategorie'   ); //PARAMETRO

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