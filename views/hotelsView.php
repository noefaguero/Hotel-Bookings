<?php

include_once './views/view.php';

/**
 * Vista del listado de hoteles.
 */
class HotelsView extends View {
    /**
     * Implementa el constructor de la clase View, para inicializar los elementos html principales.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Contruye los elementos HTML principales, incluido el main con el listado de hoteles.
     *
     * @param  array $hoteles Array de objestos de hoteles.
     * @return void
     */
    public function build($hoteles) {
        // HEAD
        self::setTitle("Madrid");

        // BODY
        // Header
        $this->header = true;
        
        // Main
        $string = 
        '<main class="container p-5">
            <h1 class="mb-5 text-center">Hoteles de Madrid</h1>';

        foreach ($hoteles as $hotel) {
            $string .= 
            '<article class="alert bg-card border-secondary mb-4 mx-auto p-4 row rounded-5 w-100">
                <div class="col-md-4 p-0">
                    <img class="rounded-3 hotel__img img-fluid" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->nombre .'">
                </div>
                <div class="col-md-8 px-0 ps-md-5 d-flex flex-column justify-content-between">
                    <div class="d-flex flex-column">
                        <h2 class="fw-bold mt-3 mt-md-0 fs-4">' . $hotel->nombre . '</h2>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                            <p class="m-0">' . $hotel->direccion . '</p>
                        </div>
                        <hr>
                        <p>' . $hotel->descripcion . '</p>
                        <p>Nº de habitaciones: ' . $hotel->num_habitaciones . '</p>
                    </div>
                    <a href="index.php?c=HotelRooms&id=' . $hotel->id . '" class="btn btn-secondary bg-orange px-3 rounded-5">VER HABITACIONES</a>
                </div>
            </article>';
        } // fin foreach

        $this->main = $string . '</main>';
    }
}
