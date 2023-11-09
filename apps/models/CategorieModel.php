<?php

require_once './config.php';
require_once './apps/models/model.php';

class CategoriesModel extends Model
{

    function getCategories()
    {

        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $categorias es un arreglo de categorías
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    function deleteCategoria($idCategorie)
    {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$idCategorie]);
        var_dump('entro al model');
    }

    function insertCategorie($categorie)
    {
        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categorie]);
        return $this->db->lastInsertId();
    }

    public function getCategorieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);

        // Obtener la categoría como un objeto
        $categorie = $query->fetch(PDO::FETCH_OBJ);

        return $categorie;
    }

    public function modifyCategorie($categorie, $id)
    {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id_categoria = ?');
        $query->execute([$categorie, $id]);
    }
}


class CategorieModel extends Model
{


    function getBooksByCategorie($href)
    {

        $query = $this->db->prepare('SELECT * FROM libros WHERE id_categoria = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categorie2 = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorie2;
    }

    function getBookByCategorie($idBook) {
        $query = $this->db->prepare('SELECT * FROM libros WHERE id_libro = ?');
        $query->execute([$idBook]);

        // $task es una tarea sola
        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }


    function deleteBook($idBook)
    {

        $query = $this->db->prepare('DELETE FROM libros WHERE id_libro = ?');
        $query->execute([$idBook]);
    }

    function insertBook($id_Categorie, $titulo_libro, $autor_libro, $anio)
    {
        // Obtener la conexión y asignarla a $this->db
        $query = $this->db->prepare('INSERT INTO libros (id_categoria, titulo_libro, autor_libro, anio) VALUES (?, ?, ?, ?)');

        $query->execute([$id_Categorie, $titulo_libro, $autor_libro, $anio]);
        return $this->db->lastInsertId();
    }

    public function modifyBook($idBook, $newTitle, $newAuthor, $newYear)
    {

        $query = $this->db->prepare('UPDATE libros SET titulo_libro = ?, autor_libro = ?, anio = ? WHERE id_libro = ?');
        $query->execute([$newTitle, $newAuthor, $newYear, $idBook]);
    }
}
