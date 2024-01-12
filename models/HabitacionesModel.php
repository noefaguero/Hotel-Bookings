<?php

include 'db/db.php';

class HabitacionesModel {

    private $db;
    private $pdo;

    public function __construct() {
        // $this->pdo = new PDO('mysql:host=localhost;dbname=hoteles', 'root', '');
        $this->db = new db();
        $this->pdo = $this->db->getPDO();
    }

    /**
     * Recupera la lista de habitaciones de la base de datos
     */
    public function getHabitaciones() {
        // Ejecuta una consulta para recuperar todas las habitaciones de la tabla habitaciones
        $stmt = $this->pdo->prepare('SELECT * FROM habitaciones');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}