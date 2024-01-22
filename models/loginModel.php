<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles/data/db.php';

class LoginModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }

    public function closeConnection() {
        $this->pdo = null;
    }

    /**
     * Consulta si el usuario con el nombre y la contraseña, proporcionados por el usuario, existe en la base de datos.
     *
     * @return void
     */
    public function comprobar($username, $password) {
        try {
            $stmt = $this->pdo->prepare('SELECT id FROM usuarios WHERE nombre=? AND contraseña=?;');
            $stmt->execute([$username, hash('sha256', $password)]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id'];
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Error&err=1');
        }
    }

    public function getUsuario($id) {
        try {
            $stmt = $this->pdo->prepare('SELECT nombre, fecha_registro, rol FROM usuarios WHERE id=?;');
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Error&err=1');
        }
    }
}