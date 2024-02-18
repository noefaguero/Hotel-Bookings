<?php

const errorsList = [
    0 => "La página web no se ha encontrado",
    1 => "En estos momentos estamos en labores de mantenimiento"
];

class ErrorsView {
    
    public function build($key) {
        
        // HEAD
        self::setTitle("Error");

        // BODY
        // Header
        $this->header = true;

        //Main
        if (!array_key_exists($key, errorsList)) $key = 0;

        $this->main = 
        '<main class="container p-5 w-75">
        <article class="alert bg-card border-secondary m-3 p-3 rounded-5 d-flex justify-content-center">
            <p>' . errorsList[$key] . '</p>
            <button class="btn btn-secondary btn-orange" onclick="history.back()">VOLVER</button>
        <article>';
        // volver
        
    }
}