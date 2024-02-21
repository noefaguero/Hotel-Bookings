<?php

/**
 * Clase abstracta para gestionar la conexión a la base de datos.
 */
abstract class DB {
    
    /** @var string Host de la base de datos.
     */
    private $host; 
    
    /** @var string Nombre de la base de datos.
     */
    private $name; 
    
    /** @var string Usuario de la base de datos.
     */
    private $username; 
    
    /** @var string Contraseña de la base de datos.
     */
    private $password;
    
    /** @var PDO|null Conexión a la base de datos.
     */
    protected $connection; // Acceso desde subclases

    /**
     * Carga la configuración de la base de datos desde el archivo de configuración.
     */
    public function __construct() {
        include './config/config.php';
        $this->host = $db['dbhost'];
        $this->name = $db['dbname'];
        $this->username = $db['dbusername'];
        $this->password = $db['dbpassword'];
    }

    /**
     * Establece la conexión a la base de datos.
     *
     * @return void
     */ 
    public function connect() {
        try { 
            $this->connection = new PDO(
                "mysql:host=$this->host;dbname=$this->name;charset=utf8",
                $this->username, 
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            // echo $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
    
    /**
     * Realiza la desconexión de la base de datos.
     *
     * @return void
     */
    public function disconnect() { 
        $this->connection = null;
    }
}
