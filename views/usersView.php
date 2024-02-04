<?php

include_once './views/view.php';

class UsersView extends View {

    public function __construct() {
        parent::__construct();
    }

    // Muestra el formulario para identificarse con el error si existe
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
                    <input type="text" class="form-control rounded-5" name="username" value="' . $username . '">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control rounded-5" name="password">
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