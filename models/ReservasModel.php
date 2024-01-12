<?php

include 'db/db.php';

class ReservasModel {

    private $db;
    private $pdo;

    public function __construct() {
        // $this->pdo = new PDO('mysql:host=localhost;dbname=hoteles', 'root', '');
        $this->db = new db();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * Recupera la lista de reservas de la base de datos
     */
    public function getReservas() {
        // Ejecuta una consulta para recuperar todas las reservas de la tabla reservas
        $stmt = $this->pdo->prepare('SELECT * FROM reservas');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}