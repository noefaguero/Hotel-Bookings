<?php

class DirectoryController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new DirectoryView();
    }

    // Muestra el listado de hoteles
    public function autorizar() {
        // Unirse a la sesión
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['user'])) header("Location: ./index.php");
    }

    public function mostrar() {
        $this->model = new DirectorynModel();
        $result = $this->model->getHabitacionesHotel();
        $this->model->closeConnection();
        $this->view->imprimir($result);
        exit;
    }
}














