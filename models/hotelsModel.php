<?php

include_once './db/db.php';

/**
 * Modelo para la gestión de hoteles en la base de datos.
 */
class HotelsModel extends DB {

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
        $this->table = "hoteles";
    }

    /**
     * Obtiene información de todos los hoteles de la base de datos.
     *
     * @return array Array de objetos de los hoteles disponibles.
     */
    public function getAllHotels() {
        $this->connect();
        try {
            $stmt = $this->connection->prepare('SELECT * FROM ' . $this->table);
            $stmt->execute();
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
     * Obtiene información de un hotel de la base de datos.
     *
     * @param  integer $id Identificador de un hotel.
     * @return object Objeto de un hotel.
     */
    public function getHotel($id) {
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
}