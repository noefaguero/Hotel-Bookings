<?php

/**
 * Clase abstracta que proporciona funciones comunes de los controladores.
 */
abstract class Controller {

    /**
     * Verifica si el usuario ha iniciado sesión.
     *
     * @return void
     */
    public function verify() {
        // Unirse a la sesión
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['usuario'])) {
            // Redirigir a la página de inicio de sesión.
            header("Location: ./index.php?a=closeSession&msg=denied");
            exit;
        }
    }
}