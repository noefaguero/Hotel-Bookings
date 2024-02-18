<?php


class HotelsModel extends DB {

    private $table;
    private $connection;
    
    public function __construct() {
        $this->table = "hoteles";
    }

    public function getAllHotels() {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM $this->table');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $this->disconnect();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $this->disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        } 
    }

    public function getHotel($id) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM $this->table WHERE id=?');
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $this->disconnect();
            return $stmt->fetch();
        } catch (PDOException $e) {
            $this->disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}