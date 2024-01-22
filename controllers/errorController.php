<?php

class ErrorController {
    
    private $view;

    public function __construct() {
        $this->view = new ErrorView();
    }

    public function mostrar() {
        $error = isset($_GET['err']) ? filter_input(INPUT_GET, 'err', FILTER_VALIDATE_INT) : 0;
        $this->view->imprimir($error);
    }
}