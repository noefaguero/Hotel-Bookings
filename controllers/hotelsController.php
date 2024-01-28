<?php

include_once './models/hotelsModel.php';
include_once './views/hotelsView.php';

class HotelsController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new HotelsView();
        $this->model = new HotelsModel();
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
        // Obtener array de hoteles
        $hoteles = $this->model->getAllHotels();
        // Imprimir vista
        $this->view->printAllHotels($hoteles);
        exit;
    }
}














