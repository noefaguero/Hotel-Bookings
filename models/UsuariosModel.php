<?php

include 'db/db.php';

class UsuariosModel {

    private $db;
    private $pdo;

    public function __construct() {
        // $this->pdo = new PDO('mysql:host=localhost;dbname=hoteles', 'root', '');
        $this->db = new db();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * Recupera la lista de usuarios de la base de datos
     */
    public function getUsuarios() {
        // Ejecuta una consulta para recuperar todas las usuarios de la tabla usuarios
        $stmt = $this->pdo->prepare('SELECT * FROM Usuarios');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}