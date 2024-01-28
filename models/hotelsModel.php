<?php

include_once './db/db.php';

class HotelsModel {

    private $db;
    private $pdo;

    public function getAllHotels() {
        // Comprobar si existe el array de hoteles en sesión
        if (!isset($_SESSION['hoteles'])) {
            // Crear objeto PDO
            $this->db = new DB();
            $this->pdo = $this->db->getPDO(); // Abrir conexión
            // Consulta a la BD 
            try {
                $stmt = $this->pdo->prepare('SELECT * FROM hoteles;');
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $_SESSION['hoteles'] = $stmt->fetchAll();
                $this->pdo = null; // Cerrar conexión
            } catch (PDOException $e) {
                // echo  $e->getMessage();
                header('Location: ./index.php?c=Errors&err=1');
            }
        }
        
        return $_SESSION['hoteles'];
    }

    public function getHotel($id) {
        foreach ($_SESSION['hoteles'] as $hotel) {
            if ($hotel->id == $id) return $hotel;
        } 
    }
}