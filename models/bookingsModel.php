<?php

include_once './db/db.php';

class BookingsModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }
    
    // Obtener información de reservas asociadas al usuario
    public function getAllBookings($id_user) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM reservas WHERE id_usuario=?;');
            $stmt->execute([$id_user]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
            exit;
        } finally {
            $this->pdo = null;
        }
    }
}