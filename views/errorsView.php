<?php

const errorMsgs = [
    0 => "La página web no se ha encontrado",
    1 => "En estos momentos estamos en labores de mantenimiento"
];

class ErrorsView {
    
    public function build($key) {

        if (!array_key_exists($key, errorMsgs)) $key = 0;

        $this->main = 
        '<a class="btn btn-secondary " href="./index.php?c=Hotels" fs-5">VOLVER</a>
        <article class="card mx-5 mx-auto p-3 col-sm-10 col-lg-6">
            <p>' . errorMsgs[$key] . '</p>
        <article>';
        // volver
        
    }
}