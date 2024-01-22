<?php 

class DB {

    private $pdo;

    public function __construct() {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles/config/config.php';
        try {
            // Crea una instancia de PDO
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            // echo $e->getMessage();
            header('Location: /6_2_ReservaHoteles/index.php?c=Error&err=1');
        }
    }

    // Obtiene una instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }
}
