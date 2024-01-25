<?php

class ErrorsView {
    
    public function print($key = 0) {
        $errors = [
            "La página web no existe, comprueba la URL introducida",
            "En estos momentos estamos en labores de mantenimiento"
        ];

        if (!array_key_exists($key, $errors)) $key = 0;

        echo
            '<p>' . $errors[$key] . '</p>';
            // volver
    }
}