<?php 

class DB {

    private $pdo;

    /**
     * Constructor de la clase DB
     */
    public function __construct() {
        require_once 'config/config.php';
        try {
            // Crea una instancia de PDO
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (Exception $ex) {
            echo $ex->getMessage();
            // En caso de error, redireccionar a una página de mantenimiento
            header("Location: ");
        }
    }

    /**
     * Obtener instancia de PDO para conectarse a la base de datos
     */
    public function getPDO() {
        return $this->pdo;
    }
}