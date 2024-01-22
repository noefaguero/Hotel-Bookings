<?php

class ErrorView {
    
    public function imprimir($key) {
        $errors = [
            "La página web no existe",
            "En estos momentos estamos en labores de mantenimiento"
        ];

        if (!array_key_exists($key, $errors)) $key = 0;

        echo
            '<p>' . $errors[$key] . '</p>';
            // volver
    }
}