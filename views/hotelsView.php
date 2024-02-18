<?php

include_once './views/view.php';

class HotelsView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function build($hoteles) {
        
        // HEAD
        self::setTitle("Madrid");

        // BODY
        // Header
        $this->header = true;
        
        // Main
        $string = 
        '<main class="container p-5">
            <h1 class="mb-3 ms-3">Hoteles de Madrid</h1>';

        foreach ($hoteles as $hotel) {
            $string .= 
            '<article class="alert bg-card border-secondary mb-5 py-4 px-3 row rounded-5">
                <div class="col-md-4">
                    <img class="w-75 rounded-3 hotel__img" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->nombre .'">
                </div>
                <div class="col-md-8 d-flex flex-column">
                    <p class="fw-bold m-0 fs-4">' . $hotel->nombre . '</p>
                    <hr>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->descripcion . '</p>
                    <p>Nº de habitaciones: ' . $hotel->num_habitaciones . '</p>
                    <a href="index.php?c=HotelRooms&id=' . $hotel->id . '" class="btn btn-secondary bg-orange px-3 rounded-5">VER HABITACIONES</a>
                </div>
            </article>';
        } // fin foreach

        $this->main = $string . '</main>';
        
    }
}
