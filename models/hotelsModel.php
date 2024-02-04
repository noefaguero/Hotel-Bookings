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
            } catch (PDOException $e) {
                // echo  $e->getMessage();
                header('Location: ./index.php?c=Errors&err=1');
            } finally {
                $this->pdo = null;
            }
        }
        
        return $_SESSION['hoteles'];
    }

    public function getHotel($id) {
        $hotel = null;
        $i=0;
        do {
            if ($_SESSION['hoteles'][$i]->id == $id) $hotel = $_SESSION['hoteles'][$i];
            $i++;
        } while ($i < (count($_SESSION['hoteles'])) && $hotel == null);
        return $hotel;
    }
}