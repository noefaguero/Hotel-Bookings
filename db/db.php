<?php 

include_once './config/config.php';

class DB {

    private $pdo;

    public function __construct() {
        try {
            // Crea una instancia de PDO
            $this->pdo = new PDO('mysql:host='.host.';dbname='.dbname, dbuser, dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo $e->getMessage();
            //header('Location: ./index.php?c=Errors&err=1');
        }
    }

    // Obtiene una instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }
}
