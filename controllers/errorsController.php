<?php

include_once './views/errorsView.php';

class ErrorsController {
    
    private $view;

    public function __construct() {
        $this->view = new ErrorsView();
    }

    public function show() {
        $error = isset($_GET['err']) ? filter_input(INPUT_GET, 'err', FILTER_VALIDATE_INT) : 0;
        $this->view->print($error);
    }
}