<?php
require_once './apps/api/controllers/ApiController.php';
require_once './apps/models/model.php';
require_once './apps/models/CategorieModel.php';



class ApiCategoriesController extends ApiController
{

    private $model1;
    private $model2;

    function __construct()
    {
        parent::__construct(); // Llamamos al constructor del padre
        $this->model1 = new CategoriesModel();
        $this->model2 = new CategorieModel();
    }

    public function get($params = [])
    {
        if (empty($params)) {
            $categories = $this->model1->getCategories();
            $this->view->response($categories, 200); // Le paso el JSON y el status
        } else {
            // Cambio CategoriesModel a CategorieModel (peguntar si esta bien instanciarla  asi)
            $booksModel = new CategorieModel();
            $book = $booksModel->getBooksByCategorie($params[':ID']);
            if (!empty($book)) {
                $this->view->response($book, 200);
            } else {
                $this->view->response(['msg' => "El ID " . $params[':ID'] . ": no existe"], 404);
                return;
            }
        }
    }

    public function deleteItem($params = [])
    {
        // Verifica si se proporciona el parámetro ":ID" en la URL
        if (isset($params[':ID'])) {
            $idCategorie= $params[':ID'];
            var_dump('chequea');

            // Determina si es una solicitud para eliminar una categoría o un libro
            if (isset ($params[':ID2'])) {
                var_dump('entre al if');
                // Es una solicitud para eliminar un libro en una categoría
                $idBook = $params[':ID2'];
                $book = $this->model2->getBookByCategorie($idBook);

                if ($book) {
                    $this->model2->deleteBook($idBook);
                    $this->view->response('El libro con el id= ' . $idBook . ' ha sido borrado.', 200);
                } else {
                    $this->view->response('El libro con id= ' . $idBook . ' no existe.', 404);
                }
            } else {
                var_dump('entre al else');
                $categorie = $this->model1->getCategorieById($idCategorie);
                // Es una solicitud para eliminar una categoría
                if($categorie){
                $this->model1->deleteCategoria($idCategorie);
                // Eliminación exitosa, redirige a la página de categorías
                $this->view->response(['msg' => "Se eliminó correctamente la categoría con ID " . $idCategorie], 200);
                }else {
                // No se proporcionó un parámetro válido en la URL
                $this->view->response(['msg' => "Parámetro no válido en la URL"], 400);
                }
            }
        }else{
            $this->view->response(['msg' => "Falta categoria/libro a eliminar"], 400);
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
            $id = $this->model1->insertCategorie($categorie);
            $this->view->response(['msg' => 'Categoría insertada con éxito'], 201);
        }
    }

    public function updateCategoria($params = [])
    {
        $id = $params[':ID'];
        $categorie = $this->model1->getCategorieById($id);

        if (!empty($id)) {
            if ($categorie) {
                $body = $this->getData();
                $newCategoria = $body->categorie;
                $this->model1->modifyCategorie($newCategoria, $id);
                $this->view->response(['msg' => 'Categoría editada con éxito'], 201);
            } else {
                $this->view->response(['msg' => "El ID " . $categorie . ": no existe"], 404);
                return;
            }
        } else {
            $this->view->response(['msg' => "Campo vacio"], 400);
            return;
        }
    }
}
