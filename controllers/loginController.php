<?php

class LoginController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new LoginView();
        // instancio la clase LoginModelo solo si la necesito
    }

    // Muestra el formulario para identificarse
    public function mostrar() {
        $this->view->imprimir();
    }

    // Procesa el formulario de identificanción de usuarios e inicia la sension
    public function identificar() {

        // Recuperar los datos del formulario
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validar los campos
        if (empty($username)) {
            $this->view->imprimir('Introduce nombre y contraseña');
            exit;
        }

        if (empty($password)) {
            $this->view->imprimir('Introduce nombre y contraseña', $username);
            exit;
        }

        // Verificar credenciales del usuario
        $this->model = new LoginModel();
        $id = $this->model->comprobar($username, $password);
        if (!$id) {
            $this->model->closeConnection();
            $this->view->imprimir('Revise nombre de usuario y contraseña', $username);
            exit;
        } 

        // Iniciar sesion
        session_start();
        $_SESSION['user'] = $this->model->getUsuario($id);
        $this->model->closeConnection();

        // Redirigir
        header('Location: ./index.php?c=Directory');
        exit;
    }
}
