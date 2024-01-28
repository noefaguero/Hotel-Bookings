<?php

class HotelsView {

    public function printAllHotels($hoteles) {
        
        // HEAD
        include_once "./views/templates/head.php";
        printHead("Madrid");

        // BODY
        echo '<body class="container body">';
        
        // Header
        include_once "./views/templates/header.php";
        printHeader("Hoteles de Madrid");
        
        // Main
        $main = "<main>";
        foreach ($hoteles as $hotel) {
            $main .= 
            '<article class="alert alert-light border-secondary m-3 row">
                <div class="col-md-4">
                    <img class="w-75 hotel__img" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->nombre .'">
                </div>
                <div class="col-md-8 d-flex flex-column">
                    <p class="fw-bold">' . $hotel->nombre . '</p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <p>' . $hotel->descripcion . '</p>
                    <p>Nº de habitaciones: ' . $hotel->num_habitaciones . '</p>
                    <form method="post" action="index.php?c=HotelRooms" class="d-flex justify-content-center py-5">
                        <input type="hidden" name="id" value="' . $hotel->id . '"/>
                        <input type="submit" class="btn btn-primary" value="VER HABITACIONES"/>
                    </form>
                </div>
            </article';
        } // fin foreach
        echo $main . '</main>';
        
        // Footer
        include_once './views/templates/footer.php';

        echo '</body>';
    }

    public function printHotel($hotel, $habitacionesView) {

        // HEAD
        include_once "./views/templates/head.php";
        printHead($hotel->nombre);

        // BODY
        echo '<body class="container body">';
        
        // Header
        include_once "./views/templates/header.php";
        printHeader($hotel->nombre);
        
        // Main
        echo 
        '<main>
            <article class="alert alert-light border-secondary m-3 row" role="alert">
                <div class="col-md-4">
                    <img class="w-75 hotel__img" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->id .'">
                </div>
                <div class="col-md-8">
                    <p class="fw-bold">' . $hotel->nombre . '</p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <p>' . $hotel->descripcion . '</p>'
                    . $habitacionesView . 
                '</div>
            </article>
        </main>';
        
        // Footer
        include_once './views/templates/footer.php';

        echo '</body>';

    }
}
