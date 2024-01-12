<?php

class UsuariosView {

    // Muestra el formulario para crear/editar una tarea
    public function mostrarFormulario() {
        // Generar el formulario
        echo 
        '<form action="index.php?controller=Usuarios&action=verificarUsuario" method="POST">
            <label>Nombre de usuario</label>
            <input type="text" name="username"">
            <label>Completada:</label>
            <input type="password" name="password"">
            <input type="submit" value="ENVIAR">
        </form>';
    }

    // Muestra un mensaje de error
    public function mostrarError($mensaje) {
        echo '<p>Error: ' . $mensaje . '</p>';
    }
}