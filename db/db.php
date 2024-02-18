<?php

abstract class DB {
    
    private $host = "localhost"; 
    private $name = "aerolinea"; 
    private $user = "root"; 
    private $password = "";
    private $connection;

    public function __construct() {
        // Cargar la configuración desde el archivo
        $config = require 'config.php';

        $this->host = $db['dbhost'];
        $this->name = $db['dbname'];
        $this->user = $db['dbuser'];
        $this->password = $db['dbpassword'];
    }

    // Conectar a la base de datos 
    public function connect() {
        try { 
            $this->connection = new PDO(
                "mysql:host=$this->servername;dbname=$this->database;charset=utf8",
                $this->username, 
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $this->connection;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //header('Location: ./index.php?c=Errors&msg=1');
        }
    }
    
    // Desconectar la base de datos
    public function disconnect() { 
        $this->connection = null;
    }
}
