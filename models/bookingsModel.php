<?php

class BookingsModel extends DB {

    private $table;
    private $connection;
    
    public function __construct() {
        $this->table = "reservas";
    }
    
    // Obtener información de reservas asociadas al usuario
    public function getAllBookings($id_user) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM $this->table WHERE id_usuario=?');
            $stmt->execute([$id_user]);
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

    public function getBooking($id) {
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

    public function insert($id_hab, $entrada, $salida) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT id_hotel FROM habitaciones WHERE id=?;');
            $stmt->execute([$id_hab]);
            $id_hotel = $stmt->fetch();
            $stmt = $this->pdo->prepare('INSERT INTO $this->table (id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) VALUES(?, ?, ?, ?, ?);');
            $stmt->execute([$_SESSION['usuario']->id, $id_hotel[0], $id_hab, $entrada, $salida]);
            $this->disconnect();
            return;
        } catch (PDOException $e) {
            $this->disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }

    public function delete($id_reserva) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('DELETE FROM $this->table WHERE id=?;');
            $stmt->execute([$id_reserva]);
            $this->disconnect();
            return;
        } catch (PDOException $e) {
            $this->disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}