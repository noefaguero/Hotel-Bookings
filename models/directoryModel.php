<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles/data/db.php';

class DirectoryModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }

    public function closeConnection() {
        $this->pdo = null;
    }

    public function getHabitacionesHotel() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM hoteles;');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $hoteles = $stmt->fetchAll();
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Error&err=1');
        }

        try {
            $stmt = $this->pdo->prepare('SELECT * FROM habitaciones;');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $hoteles = $stmt->fetchAll();
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Error&err=1');
        }



        foreach($hoteles as $hotel) {
            $hotelRooms = [];
            foreach($habitaciones as $habitación) {
                if($hotel->id == $habitación->id) {
                    array_push($hotelRooms, $habitacion);
                }
            }
            $hotel->habitaciones = $hotelRooms;
        }
        
        return $hoteles; 
    }
}