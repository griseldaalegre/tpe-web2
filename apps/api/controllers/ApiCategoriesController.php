<?php
require_once './apps/api/controllers/ApiController.php';
require_once './apps/models/model.php';
require_once './apps/models/CategoriesModel.php';
require_once './apps/models/BooksModel.php';



class ApiCategoriesController extends ApiController{
    
    private $model;

    function __construct()
    {
        parent::__construct(); // Llamamos al constructor del padre
        $this->model = new CategoriesModel();
    }

    
    public function getCategories($params = [])
    {
        if (empty($params)) {
            $categories = $this->model->getCategories();
            $this->view->response(['msg' => 'Datos de las categorias obtenidos con éxito', 'categories' => $categories], 200);
        } else {
            // Cambio CategoriesModel a CategorieModel (peguntar si esta bien instanciarla  asi)
            $booksModel = new BooksModel();
            $book = $booksModel->getBooksByCategorie($params[':ID']);
            if (!empty($book)) {
                $this->view->response(['msg' => 'Datos del los libros por categoria obtenidos con éxito', 'book' => $book], 200);
            } else {
                $this->view->response(['msg' => "El ID ".$params[':ID'].": no existe"], 404);
                return;
            }
        }
    }

    public function getCategoriesPag($params = [])
    { 
        $page = isset($params[':page']) ? $params[':page'] : 1;
        $perPage = 3; // Número deseado de categorías por página

        $categories = $this->model->getCategoriesPaginated($page, $perPage);

        if (!empty($categories)) {
            // Obtener todas las categorías paginadas
            $this->view->response(['msg' => 'Datos de las categorías obtenidos con éxito', 'categories' => $categories], 200);
        } else {
            // Si no hay categorías, responder con un error
            $this->view->response(['msg' => 'Error al obtener las categorías o la página solicitada no tiene resultados'], 404);
        }
    }
    
    public function getOrderedCategories($params = []) {
        // Verifica que el valor de $order sea válido (ASC o DESC)
        $order = $params[':order'];

        if ($order !== 'ASC' && $order !== 'DESC') {
            $this->view->response(['msg' => 'Error en el parámetro de orden'], 404);
            return;
        }

        // Obtén las categorías ordenadas
        $categories = $this->model->getCategoriesOrdered($order);

        if ($categories !== false) {
            $this->view->response(['msg' => 'Datos de las categorías obtenidos ordenadas con éxito', 'Categorias' => $categories], 200);
        } else {
            $this->view->response(['msg' => 'Error al obtener las categorías'], 404);
        }
    }

    public function getOrderedCategoriesById($params = []) {

        $order = $params[':order'];

        if ($order !== 'ASC' && $order !== 'DESC') {
            $this->view->response(['msg' => 'Error en el parámetro de orden'], 400);
            return;
        }
    
        // Verifica que el ID de la categoría esté presente
        if (!isset($params[':ID'])) {
            $this->view->response(['msg' => 'Error, ID de categoría no presente en la solicitud'], 400);
            return;
        }
        $id = $params[':ID']; 

        if (!$this->model->categoriaExiste($id)) {
            $this->view->response(['msg' => 'La categoría ' . $id .  ' especificada no existe'], 404);
            return;
        } else {
            $booksModel = new BooksModel();
            $book = $booksModel->getBookOrderedByIdCategories($id, $order);
    
            if ($book !== false) {
                $this->view->response(['msg' => 'Datos de las categorías obtenidos ordenadas con éxito', 'Categorias' => $book], 200);
            } else {
                $this->view->response(['msg' => 'Error al obtener las categorías'], 400);
            }
        }
    }

    public function getFilterCategories($params = [])
    {
        $filtro = $params[':letter'];

        if (!$filtro) {
            $this->view->response(['msg' => 'Filtrado vacio.'], 400);
            return;
        }
        $categoriasFiltrada = $this->model->getCategoriesFilter($filtro);

        if (!empty($categoriasFiltrada)) {
            $this->view->response(['msg' => 'Datos de las categorías filtradas obtenidas con éxito', 'Categorias' => $categoriasFiltrada], 200);
        } else {
            $this->view->response(['msg' => 'No se encontro resultado.'], 404);
        }


    }

    public function delete($params = [])
    {
        $idCategorie = $params[':ID'];
        
        if (!$this->model->categoriaExiste($idCategorie)) {
            $this->view->response(['msg' => 'La categoría ' . $idCategorie .  ' especificada no existe'], 404);
            return;
        }
        if($idCategorie){
            $this->model->deleteCategoria($idCategorie );
            // Eliminación exitosa, redirige a la página de categorías
            $this->view->response(['msg' => "Se elimino correctamente ".$idCategorie], 200);
        }
    }

    public function create($params = [])
    {
        //obtengo el body q me envia el cliente
        $body =  $this->getData(); //desarma json nos genera un obj

        $categorie = $body->categorie;
        //despues hacer control
        if (empty($categorie)) {
            $this->view->response(['msg' => 'Campo incompleto'], 400);
        } else {
            $this->model->insertCategorie($categorie);
            $this->view->response(['msg' => 'La categoría fue agregada con éxito.', 'Categoria' => $categorie], 201);

        }
    }

    public function updateCategoria($params = [])
    {
        $id= $params[':ID'];
        $categorie = $this->model->getCategorieById($id);

        if (!$this->model->categoriaExiste($id)) {
            $this->view->response(['msg' => 'La categoría ' . $id .  ' especificada no existe'], 401);
            return;
        }
        if(!empty($id)){
            if($categorie){
                $body = $this->getData();
                $newCategoria= $body->categorie;
                $this->model->modifyCategorie($newCategoria, $id);
                $this->view->response(['msg' => 'La categoría fue modificada con éxito.', 'Categoria' => $categorie], 201);
            } else {
                $this->view->response(['msg' => "El ID ".$id.": no existe"], 404);
                return;
            }
        } else {
            $this->view->response(['msg' => "Campo vacio"], 400);
            return;
        }
  
    }
}
    
