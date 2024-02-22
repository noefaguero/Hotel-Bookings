<?php

include_once './views/view.php';

// Diccionario de errores
const ERROR_TYPE = [
    0 => "La página web no se ha encontrado",
    1 => "En estos momentos estamos en labores de mantenimiento"
];

/**
 * Vista del mensaje de error.
 */
class ErrorsView extends View {
    /**
     * Implementa el constructor de la clase View, para inicializar los elementos html principales.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Contruye los elementos HTML principales, incluido el main con el mensaje de error.
     *
     * @param  integer $key Clave del error.
     * @return void
     */
    public function build($key) {
        // HEAD
        self::setTitle("Error");

        // BODY
        // Main
        if (!array_key_exists($key, ERROR_TYPE)) $key = 0;

        $this->main = 
        '<main class="container p-5 w-75">
            <div class="alert bg-card border-secondary m-5 p-5 rounded-5 d-flex gap-5 flex-column align-items-center">
                <p class="fs-4">' . ERROR_TYPE[$key] . '</p>
                <button class="btn btn-secondary bg-orange rounded-5" onclick="history.back()">VOLVER</button>
            </div>
        </main>';
    }
}