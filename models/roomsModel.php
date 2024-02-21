<?php

include_once './db/db.php';

/**
 * Modelo para la gestión de habitaciones en la base de datos.
 */
class RoomsModel extends DB {

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
        $this->table = "habitaciones";
    }
    
    /**
     * Obtiene información de todas las habitacioones de un hotel de la base de datos.
     *
     * @param  integer $hotel_id Identificador de un hotel.
     * @return array Array de objetos de las habitaciones de un hotel.
     */
    public function getAllRooms($hotel_id) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT * FROM ' . $this->table  . ' WHERE id_hotel=?');
            $stmt->execute([$hotel_id]);
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
     * Obtiene la información de una habitación de la base de datos.
     *
     * @param  integer $hab_id Identificador de una habitación.
     * @return object Objeto de una habitación.
     */
    public function getRoom($hab_id) {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT * FROM ' . $this->table  . ' WHERE id=?');
            $stmt->execute([$hab_id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            self::disconnect();
            return $stmt->fetch();
        } catch (PDOException $e) {
            self::disconnect();
            // echo $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}