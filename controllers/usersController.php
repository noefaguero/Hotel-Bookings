<?php

include_once './models/usersModel.php';
include_once './views/usersView.php';

/**
 * Controlador para la gestión de usuarios.
 */
class UsersController {
    
    /** 
     * @var object $model Modelo de usuarios.
     */
    private $model;

    /** 
     * @var object $view Vista del formulario de inicio de sesión.
     */
    private $view;

    /**
     * Inicializa las instancias de la vista y el modelo de usuarios.
     */
    public function __construct() {
        $this->view = new UsersView();
        $this->model = new UsersModel();
    }
    
    /**
     * Controla la visualización del formulario para iniciar de sesión. 
     *
     * @return object Vista del formulario de inicio de sesión.
     */
    public function show() {
        $this->view->build();
        return $this->view;
    }
    
    /**
     * Procesa el formulario de identificanción de usuarios e inicia la sesión.
     *
     * @return object Vista del formulario de inicio de sesión.
     */
    public function verifyLogin() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Recuperar los datos del formulario
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            // Validar los campos
            if (empty($username)) {
                $this->view->build('Introduce nombre y contraseña');
                return $this->view;
            }

            if (empty($password)) {
                $this->view->build('Introduce nombre y contraseña', $username);
                return $this->view;
            }

            // Verificar credenciales del usuario
            $user = $this->model->getUser($username, $password);
            if (!$user) {
                $this->view->build('Revise nombre de usuario y contraseña', $username);
                return $this->view;
            } 

            // Comprobar si hay una sesión previa
            if (isset($_SESSION['usuario'])){
                $_SESSION = array();
                session_destroy();
                setcookie(session_name(), "", time()-1000, "/");
            }

            // Iniciar sesión
            session_start();
            $_SESSION['usuario'] = $user;
            // Registrar la última conexión del usuario en una cookie
            setcookie('lastConnection', date('d-m-Y H:i:s'), time()+86400, "/"); 
            // Redirigir a la página principal
            header('Location: ./index.php?c=Hotels');
            exit;
        }
        
        header('Location: ./index.php?c=Errors');
        exit;
    }
    
    /**
     * Cierra la sesión del usuario.
     *
     * @return object Vista del formulario de inicio de sesión.
     */
    public function closeSession() {
        
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
            if ($msg == "denied") {
                $this->view->build('Inicie sesión para continuar');
                return $this->view;
            }
            header('Location: ./index.php?c=Errors');
            exit;
        }

        // Unirse a la sesión
        session_start();
        // Destruir la sesión
        $_SESSION = array();
        session_destroy();
        // Eliminar la cookie de sesión
        setcookie(session_name(), "", time()-1000, "/");
        self::show();
    }
}
