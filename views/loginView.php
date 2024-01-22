<?php

class LoginView {

    // Muestra el formulario para identificarse con el error si existe
    public function imprimir($error="", $username="") {
        echo
            '<form action="index.php?c=Login&a=identificar" method="post" class="card mt-5 mx-auto p-3 col-sm-10 col-lg-6">
                <div class="mb-3">
                    <label for="user" class="form-label" >Usuario</label>
                    <input type="text" class="form-control" name="username" value="' . $username . '">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <p class="text-danger">' . $error . '</p>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary w-100" value="ENTRAR">
                </div>
            </form>';
    }
}