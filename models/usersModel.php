<?php

include_once './db/db.php';

class UsersModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }
    
    // Obtener información el usuario si existe
    public function getUser($username, $password) {
        try {
            $stmt = $this->pdo->prepare('SELECT nombre, fecha_registro, rol FROM usuarios WHERE nombre=? AND contraseña=?;');
            $stmt->execute([strtolower($username), hash('sha256', $password)]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetch();
            $this->pdo = null;
            return $result;
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
        }
    }
}