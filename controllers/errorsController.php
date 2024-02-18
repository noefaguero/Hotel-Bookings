<?php

include_once './controllers/controller.php';
include_once './views/errorsView.php';

class ErrorsController extends Controller {
    
    private $view;

    public function __construct() {
        $this->view = new ErrorsView();
    }

    public function show() {
        self::verify();
        $message = isset($_GET['msg']) ? filter_input(INPUT_GET, 'msg', FILTER_VALIDATE_INT) : 0;
        $this->view->build($message);
        return $this->view;
    }
}