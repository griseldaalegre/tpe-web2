<?php
require_once './apps/models/CategorieModel.php';
require_once './apps/views/CategorieView.php';
require_once './apps/helpers/AuthHelper.php';
require_once './config.php';
require_once './apps/controllers/ErrorController.php';

class CategoriesController
{
    //privates

    private $model;
    private $view;


    public function __construct()
    {

        AuthHelper::verify();

        $this->model = new CategoriesModel();
        $this->view = new CategoriesView();
    }

    public function showCategories()
    {

        $categories = $this->model->getCategories();
        $href = $this->view->showCategories($categories);
    }

    public function removeCategorie($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL . 'categorias');
        } else {
            try {

                $this->model->deleteCategoria($id);
                // Eliminación exitosa, redirige a la página de categorías
                header('Location: ' . BASE_URL . 'categorias');
            } catch (\Throwable $th) {
                $categoria =  $this->model->getCategorieById($id);
                $controller = new ErrorController();
                $controller->showErrorDelete("La Categoria: **" . $categoria->categoria . "** contiene libros, primero debe vaciar.", $this->model);
            }
        }
    }

    public function addCategorie()
    {
        $categorie = $_GET['categorie'];
        if (empty($categorie)) {
            $controller = new ErrorController();
            $controller->showErrorNonDataCat('Datos Vacios',  $this->model);
        } else {
            $newCategorie = $this->model->insertCategorie($categorie);
            if ($newCategorie) {
                header('Location: ' . BASE_URL . 'categorias');
            } else {
                $controller = new ErrorController();
                $controller->showErrorInsert("Error al insertar la categoría");
            }
        }
    }


    public function editCategorie($id)
    {
        $categorie = $this->model->getCategorieById($id);
        $this->view->showEditCategorieForm($categorie, $id);
    }


    public function updateCategorie($id)
    {
        $categorie = $_GET['newCategorie'];

        if (empty($categorie)) {

            $controller = new ErrorController();
            $controller->showErrorNonDataCat('Datos Vacios',  $this->model);
        } else {
            $this->model->modifyCategorie($categorie, $id);
            header('Location: ' . BASE_URL . 'categorias');
        }
    }
}


class CategorieController
{
    private $model;
    private $view;

    public function __construct()
    {
        AuthHelper::verify();

        $this->model = new CategorieModel();
        $this->view = new CategorieView();
    }

    public function showBooksByCategorieId($categorieId)
    {
        $ListBooks = $this->model->getBooksByCategorie($categorieId);
        $this->view->showBooksByCategorieId($ListBooks, $categorieId);
    }

    public function removeBook($idCategorie, $idBook)
    {
        $this->model->deleteBook($idBook);
        header('Location: ' . BASE_URL . 'libroByCategoria/' . $idCategorie);
    }

    public function addBook($categorieId)
    {
        $titulo_libro = $_GET['titulo_libro'];
        $autor_libro = $_GET['autor_libro'];
        $anio = $_GET['anio'];
        $id_Categorie = $categorieId;

        if (empty($id_Categorie) || empty($titulo_libro) || empty($autor_libro) || empty($anio)) {


            var_dump($id_Categorie, $titulo_libro, $autor_libro, $anio);
        } else {
            $this->model->insertBook($id_Categorie, $titulo_libro, $autor_libro, $anio);
            header('Location: ' . BASE_URL . 'libroByCategoria/' . $id_Categorie);
        }
    }

    public function  editBook($idBook)
    {
        $this->view->showEditBookForm($idBook);
    }

    public function updateBook($idBook)
    {
        $newTitle = $_POST['nuevoTitulo'];
        $newAuthor =  $_POST['nuevoAutor'];
        $newYear =   $_POST['nuevoAnio'];

        if (empty($newTitle) || empty($newAuthor) || empty($newYear)) {
        } else {
            $this->model->modifyBook($idBook, $newTitle, $newAuthor, $newYear);
            header('Location: ' . BASE_URL . 'categorias');
        }
    }
}
