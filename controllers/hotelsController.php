<?php

include_once './models/hotelsModel.php';
include_once './views/hotelsView.php';

class HotelsController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new HotelsView();
        // solo instacio el modelo si se necesita (se abre la conexión con la BD)
    }

    public function verify() {
        // Unirse a la sesión
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['usuario'])) {
            header("Location: ./index.php");
            exit;
        }
    }

    // showAllHotels
    public function show() { 
        // Autorizacion
        self::verify();
        // Comprobar si existe el array de hoteles en sesión
        if (!isset($_SESSION['hoteles'])) {
            $this->model = new HotelsModel();
            $_SESSION['hoteles'] = $this->model->getAllHotels();
        }
        $this->view->print($_SESSION['hoteles']);
        exit;
    }

    
}














