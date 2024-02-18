<?php

class UsersModel extends DB {

    private $table;
    private $connection;
    
    public function __construct() {
        $this->table = "usuarios";
    }
    
    // Obtener información el usuario si existe
    public function getUser($username, $password) {
        $this->connection = $this->connect();
        try {
            $stmt = $this->pdo->prepare('SELECT nombre, id, fecha_registro, rol FROM $this->table WHERE nombre=? AND contraseña=?;');
            $stmt->execute([strtolower($username), hash('sha256', $password)]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $result = $stmt->fetch();
            $this->disconnect();
            return $result;
        } catch (PDOException $e) {
            $this->disconnect();
            // echo  $e->getMessage();
            header('Location: ./index.php?c=Errors&msg=1');
            exit;
        }
    }
}