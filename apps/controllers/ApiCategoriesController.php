<?php
require_once './apps/models/model.php';
require_once './apps/models/CategorieModel.php';
require_once './apps/views/ApiView.php';

class ApiCategoriesController{
    
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoriesModel();
        $this->view = new ApiView();
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
}
    
