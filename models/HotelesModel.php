<?php

include 'db/db.php';

class HotelesModel {

    private $db;
    private $pdo;

    public function __construct() {
        // $this->pdo = new PDO('mysql:host=localhost;dbname=hoteles', 'root', '');
        $this->db = new db();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * Recupera la lista de hoteles de la base de datos
     */
    public function getHoteles() {
        // Ejecuta una consulta para recuperar todas las hoteles de la tabla hoteles
        $stmt = $this->pdo->prepare('SELECT * FROM hoteles');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}