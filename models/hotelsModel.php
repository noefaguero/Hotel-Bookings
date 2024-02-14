<?php

include_once './db/db.php';

class HotelsModel {

    private $db;
    private $pdo;

    public function __construct() {
        $this->db = new DB();
        $this->pdo = $this->db->getPDO(); // Abrir conexión
    }

    public function getAllHotels() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM hoteles;');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
        } finally {
            $this->pdo = null;
        }
    }

    public function getHotel($id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM hoteles WHERE id=?;');
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetch();
        } catch (PDOException $e) {
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&err=1');
        } finally {
            $this->pdo = null;
        }
    }
}