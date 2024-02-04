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

    public function insert($id_hab, $entrada, $salida) {
        try {
            $stmt = $this->pdo->prepare('SELECT id_hotel FROM habitaciones WHERE id=?;');
            $stmt->execute([$id_hab]);
            $id_hotel = $stmt->fetch();
            $stmt = $this->pdo->prepare('INSERT INTO reservas (id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) VALUES(?, ?, ?, ?, ?);');
            $stmt->execute([$_SESSION['usuario']->id, $id_hotel[0], $id_hab, $entrada, $salida]);
            return;
        } catch (PDOException $e) {
            echo  $e->getMessage();
            //header('Location: ./index.php?c=Errors&err=1');
            //exit;
        } finally {
            $this->pdo = null;
        }
    }
}