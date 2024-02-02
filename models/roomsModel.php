<?php

include_once './db/db.php';

class RoomsModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();
    }

    public function getAllRooms($hotel_id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM habitaciones WHERE id_hotel=?;');
            $stmt->execute([$hotel_id]);
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

    public function getRoom($hab_id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM habitaciones WHERE id=?;');
            $stmt->execute([$hab_id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return$stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
            exit;
        } finally {
            $this->pdo = null;
        }
    }
}
