<?php

include_once './data/db.php';

class HotelsModel {

    private $db;
    private $pdo;

    public function __construct() {   
        $this->db = new DB();
        $this->pdo = $this->db->getPDO();;
    }

    public function getAllHotels() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM hoteles;');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetchAll();
            $this->pdo = null;
            return $result;
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
        }
    }
    // mejor obtener del array guardado en sesion
    public function getHotel($id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * WHERE id=? FROM hoteles;');
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetch();
            $this->pdo = null;
            return $result;
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
        }
    }
}
