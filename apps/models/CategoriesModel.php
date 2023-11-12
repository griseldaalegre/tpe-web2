<?php

require_once './config.php';
require_once './apps/models/model.php';

class CategoriesModel extends Model
{
    
    public function getCategoriesOrdered($order) {
        $query = $this->db->prepare("SELECT * FROM categorias ORDER BY id_categoria $order");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCategoriesFilter($filtro){
        $query = $this->db->prepare("SELECT * FROM categorias WHERE categoria LIKE '$filtro%'");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
        
    }
    
    public function getCategoriesPaginated($page, $perPage) {
        $offset = ($page - 1) * $perPage;

        $query = $this->db->prepare("SELECT * FROM categorias LIMIT :perPage OFFSET :offset"); //Se prepara una consulta SQL que selecciona todas las columnas de la tabla categorias limitando el resultado a la cantidad de elementos por página (:perPage) y desplazándose hasta la posición correcta (:offset).
        $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
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

    public function categoriaExiste($idCategorie) {
        $query = $this->db->prepare('SELECT COUNT(*) as count FROM categorias WHERE id_categoria = ?');
        $query->execute([$idCategorie]);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Si el resultado es mayor a cero, significa que la categoría existe
        return $result['count'] > 0;
    }

}