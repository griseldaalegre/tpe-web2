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

    public function getAllCategories()
    {
        $categories = $this->model->getCategories();
        $this->view->response($categories,  200); //le paso el json y el status
    }
}