<?php

include_once './db/db.php';

/**
 * Modelo para la gestión de reservas en la base de datos.
 */
class BookingsModel extends DB {

    /** 
     * @var string $table Nombre de la tabla en la base de datos. 
     */
    private $table;
        
    /**
     * Establece el nombre de la tabla e implementa el constructor de la clase DB, para inicializar la configuración de la base de datos.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->table = "reservas";
    }
     
    /**
     * Obtiene información de las reservas asociadas a un usuario de la base de datos.
     *
     * @param  integer $id_user Identificador del usuario.
     * @return array Array de objetos de reservas.
     */
    public function getAllBookings($id_user) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT * FROM ' . $this->table  . ' WHERE id_usuario=?');
            $stmt->execute([$id_user]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            self::disconnect();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            self::disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
    
    /**
     * Obtiene información de una reserva de la base de datos.
     *
     * @param  integer $id Identificador de la reserva.
     * @return object Objeto de una reserva.
     */
    public function getBooking($id) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT * FROM ' . $this->table  . ' WHERE id=?');
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            self::disconnect();
            return $stmt->fetch();
        } catch (PDOException $e) {
            self::disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
    
    /**
     * Inserta una nueva reserva de una habitación en la base de datos.
     *
     * @param  integer $id_hab Identificador de la habitación.
     * @param  string $entrada Fecha de entrada en ISO 8601.
     * @param  string $salida Fecha de salida en ISO 8601.
     * @return void
     */
    public function insert($id_hab, $entrada, $salida) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT id_hotel FROM habitaciones WHERE id=?');
            $stmt->execute([$id_hab]);
            $id_hotel = $stmt->fetch();
            $stmt = $this->connection->prepare('INSERT INTO ' . $this->table  . ' (id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) VALUES(?, ?, ?, ?, ?);');
            $stmt->execute([$_SESSION['usuario']->id, $id_hotel[0], $id_hab, $entrada, $salida]);
            self::disconnect();
            return "LA RESERVA SE HA REALIZADO CORRECTAMENTE";
        } catch (PDOException $e) {
            self::disconnect();
            // echo  $e->getMessage();
            return "NO SE HA PODIDO REALIZAR LA RESERVA</p><p>INTÉNTALO MÁS TARDE";
        }
    }
    
    /**
     * Elimina una reserva existente en la base de datos.
     *
     * @param  integer $id_reserva Identificador de la reserva.
     * @return void
     */
    public function delete($id_reserva) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('DELETE FROM ' . $this->table  . ' WHERE id=?');
            $stmt->execute([$id_reserva]);
            self::disconnect();
            return "LA RESERVA SE HA ELIMINADO CORRECTAMENTE";
        } catch (PDOException $e) {
            self::disconnect();
            // echo  $e->getMessage();
            return "NO SE HA PODIDO ELIMINAR LA RESERVA</p><p>INTÉNTALO MÁS TARDE";
        }
    }
}