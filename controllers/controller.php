<?php

abstract class Controller {
    
    public function verify() {
        // Unirse a la sesión
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['usuario'])) {
            header("Location: ./index.php?c=verifyLogin&msg=denied");
            exit;
        }
    }
}