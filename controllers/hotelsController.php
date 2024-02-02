<?php

include_once './controllers/controller.php';
include_once './models/hotelsModel.php';
include_once './views/hotelsView.php';

class HotelsController extends Controller {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new HotelsView();
        $this->model = new HotelsModel();
    }

    // showAllHotels
    public function show() { 
        // Autorizacion
        self::verify();
        // Obtener array de hoteles
        $hoteles = $this->model->getAllHotels();
        // Imprimir vista
        $this->view->build($hoteles);
        return $this->view;
    }
}














