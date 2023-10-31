<?php
require_once './apps/api/controllers/ApiController.php';
require_once './apps/models/model.php';
require_once './apps/models/CategorieModel.php';



class ApiCategoriesController extends ApiController{
    
    private $model;

    function __construct()
    {
        parent::__construct(); // Llamamos al constructor del padre
        $this->model = new CategoriesModel();
    }
    
    public function get($params = [])
    {
        if (empty($params)) {
            $categories = $this->model->getCategories();
            $this->view->response($categories, 200); // Le paso el JSON y el status
        } else {
            // Cambio CategoriesModel a CategorieModel (peguntar si esta bien instanciarla  asi)
            $booksModel = new CategorieModel();
            $book = $booksModel->getBooksByCategorie($params[':ID']);
            if (!empty($book)) {
                $this->view->response($book, 200);
            } else {
                $this->view->response(['msg' => "El ID ".$params[':ID'].": no existe"], 404);
            }
        }
    }

    public function delete($params = [])
    {
        $idCategorie = $params[':ID'];
        if($idCategorie){
            $this->model->deleteCategoria($idCategorie );
            // Eliminación exitosa, redirige a la página de categorías
            $this->view->response(['msg' => "Se elimino correctamente ".$idCategorie], 200);
        } else {

            $this->view->response(['msg' => "El ID ".$idCategorie.": no existe"], 404);
        }
    }

    public function create($params = [])
    {
        //obtengo el body q me envia el cliente
        $body =  $this->getData(); //desarma json nos genera un obj

        $categorie = $body->categorie;
        //despues hacer control
        if (empty($categorie)) {
            $this->view->response(['msg' => "Campo incompleto"], 400);
        } else {
            $id = $this->model->insertCategorie($categorie);
            $this->view->response(['msg' => 'Categoría insertada con éxito'], 201);

        }

    }
}
    
