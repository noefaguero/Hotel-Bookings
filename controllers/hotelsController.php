<?php

include_once './controllers/controller.php';
include_once './models/hotelsModel.php';
include_once './views/hotelsView.php';

/**
 * Controlador para la gestión de hoteles.
 */
class HotelsController extends Controller {
    
    /** 
     * @var object Modelo de hoteles.
     */
    private $model;
    
    /** 
     * @var object Vista de hoteles.
     */
    private $view;

    /**
     * Inicializa las instancias de la vista y el modelo de hoteles.
     */
    public function __construct() {
        $this->view = new HotelsView();
        $this->model = new HotelsModel();
    }

    /**
     * Controla la visualización de todos los hoteles disponibles.
     *
     * @return object Vista de hoteles.
     */
    public function show() { 
        // Autorización
        self::verify();

        // Obtener array de hoteles
        $hoteles = $this->model->getAllHotels(); 

        // Imprimir vista
        $this->view->build($hoteles);
        return $this->view;
    }
}














