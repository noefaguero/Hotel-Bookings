<?php

include_once './db/db.php';

/**
 * Modelo para la gestión de usuarios en la base de datos.
 */
class UsersModel extends DB {

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
        $this->table = "usuarios";
    }
       
    /**
     * Obtener información de un usuario de la base de datos.
     *
     * @param  string $username Nombre de usuario.
     * @param  string $password Contraseña de usuario.
     * @return object Objeto de un usuario.
     */
    public function getUser($username, $password) {
        self::connect();
        try {
            $stmt = $this->connection->prepare('SELECT nombre, id, fecha_registro, rol FROM ' . $this->table  . ' WHERE nombre=? AND contraseña=?');
            $stmt->execute([strtolower($username), hash('sha256', $password)]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetch();
            self::disconnect();
            return $result;
        } catch (PDOException $e) {
            self::disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}