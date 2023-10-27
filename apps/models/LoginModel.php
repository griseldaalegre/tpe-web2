<?php

require_once './config.php';
require_once './apps/models/model.php';
class LoginModel extends Model
{

    public function getLogin($user)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$user]);

        $userDb = $query->fetch(PDO::FETCH_OBJ);

        return $userDb;
    }

    public function insertUser($user, $passwordHash)
    {
        $query = $this->db->prepare('INSERT INTO usuarios (nombre_usuario, clave_usuario) VALUES (?, ?)');

        $query->execute([$user, $passwordHash]);
        return $this->db->lastInsertId();
    }
}
