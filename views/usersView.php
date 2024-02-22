<?php

include_once './views/view.php';

/**
 * Vista del formulario para el inicio de sesión.
 */
class UsersView extends View {
    /**
     * Implementa el constructor de la clase View, para inicializar los elementos html principales.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Contruye los elementos HTML principales, incluido el main con el formulario de inicio de sesión.
     *
     * @param  mixed $error Feedback de error en la autenticación, si existe.
     * @param  mixed $username Input previo del nombre de usuario, si existe.
     * @return void
     */
    public function build($error="", $username="") {
        // HEAD
        self::setTitle("Iniciar Sesión");
        // BODY
        $this->main =
        '<header class="container-fluid">
            <h1 class="text-center fs-2 logo py-5">HEAVEN ROOMS</h1>
        </header>
        <main class="pb-5 container">
            <form action="index.php?c=Users&a=verifyLogin" method="post" class="card my-5 mx-auto p-4 col-sm-10 col-lg-4 rounded-5">
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" id="user" class="form-control rounded-5" name="username" value="' . $username . '">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" class="form-control rounded-5" name="password">
                </div>
                <div class="mb-3">
                    <p class="text-orange">' . $error . '</p>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-secondary bg-orange w-100 rounded-5" value="ENTRAR">
                </div>
            </form>
        </main>';
    }
}