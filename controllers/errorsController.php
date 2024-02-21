<?php

include_once './controllers/controller.php';
include_once './views/errorsView.php';

/**
 * Controlador para la gestión de errores.
 */
class ErrorsController extends Controller {
    
    /**
     * @var object Vista de error. 
     */
    private $view;

    /**
     * Inicializa la instancia de la vista de errores.
     */
    public function __construct() {
        $this->view = new ErrorsView();
    }

    /**
     * Controla la visualización de la página de error.
     *
     * @return object Vista de error.
     */
    public function show() {
        // Obtener clave del mensaje de error
        $message = isset($_GET['msg']) ? filter_input(INPUT_GET, 'msg', FILTER_VALIDATE_INT) : 0;
        
        // Construir la vista
        $this->view->build($message);
        return $this->view;
    }
}
