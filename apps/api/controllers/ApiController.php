<?php
require_once 'apps/api/view/ApiView.php';
//creo clase abstracta para todos los servicios, para encapsular metodos comunes
//esto se hizo xra traducir a json lo que envia el usuario
abstract class ApiController {
    protected $view;
    private $data;
    
    function __construct() {
        $this->view = new ApiView();
        $this->data = file_get_contents('php://input');
    }

    function getData() {
        return json_decode($this->data);
    }

}

?>
