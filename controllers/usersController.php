<?php

include_once './models/usersModel.php';
include_once './views/usersView.php';

class UsersController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new UsersView();
        // instancio la clase UsersModel solo si la necesito (se abre la conexion)
    }

    // Muestra el formulario para identificarse
    public function show() {
        $this->view->print();
    }

    // Procesa el formulario de identificanción de usuarios e inicia la sension
    public function verify() {

        // Recuperar los datos del formulario
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validar los campos
        if (empty($username)) {
            $this->view->print('Introduce nombre y contraseña');
            exit;
        }

        if (empty($password)) {
            $this->view->print('Introduce nombre y contraseña', $username);
            exit;
        }

        // Verificar credenciales del usuario
        $this->model = new UsersModel();
        $id = $this->model->check($username, $password);
        if (!$id) {
            $this->view->print('Revise nombre de usuario y contraseña', $username);
            exit;
        } 

        // Comprobar si hay una sesion previa
        if (isset($_SESSION['usuario'])){
            $_SESSION = array();
            session_destroy();
            setcookie(session_name(),"", time()-1000,"/");
        }

        // Iniciar sesion
        session_start();
        $_SESSION['usuario'] = $this->model->getUser($id);

        // Redirigir a página principal
        header('Location: ./index.php?c=Hotels');
        exit;
    }
}
