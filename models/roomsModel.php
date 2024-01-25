<?php

include_once './data/db.php';

class RoomsModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }

    public function getAllHotelRooms($hotel_id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM habitaciones WHERE id_hotel=?;');
            $stmt->execute([$hotel_id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetchAll();
            $this->pdo = null;
            return $result;
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errosr&err=1');
        }
    }
}
