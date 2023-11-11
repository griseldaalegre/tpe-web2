<?php

require_once './config.php';
require_once './apps/models/model.php';

class BooksModel extends Model
{


    function getBooksByCategorie($href)
    {

        $query = $this->db->prepare('SELECT * FROM libros WHERE id_categoria = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categorie2 = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorie2;
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
