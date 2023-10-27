<?php

class ApiCategoriasController{
    
    private $model;
    private $view;

    function constant()
    {
        $this->model = new CategorieModel();
    }

    public function getAllCategories()
    {
        echo "Hola";
    }
}