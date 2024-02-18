<?php

class RoomsModel extends DB {

    private $table;
    private $connection;
    
    public function __construct() {
        $this->table = "habitaciones";
    }

    public function getAllRooms($hotel_id) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM $this->table WHERE id_hotel=?;');
            $stmt->execute([$hotel_id]);
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

    public function getRoom($hab_id) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM $this->table WHERE id=?;');
            $stmt->execute([$hab_id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $this->disconnect();
            return $stmt->fetch();
        } catch (PDOException $e) {
            $this->disconnect();
            // echo $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}
