<?php

include_once './views/view.php';

class HotelRoomsView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function buildRoomsTable($habitaciones) {

        if (count($habitaciones) == 0) {
            return (
            '<div class="alert alert-secondary p-3" role="alert">
                <p>En estos momentos no hay habitaciones disponibles en este hotel</p>
            </div>');
        }
        
        // Tabla de habitaciones
        $tabla = 
        '<table class="table table-hover">
            <thead class="table__header rounded">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="tbody">';
        // Habitaciones
        foreach ($habitaciones as $habitacion) {
            $tabla .= 
            '<tr>
                <td>' . $habitacion->num_habitacion . '</td>
                <td>' .$habitacion->tipo . '</td>
                <td>' . $habitacion->precio . '€</td>
                <td>' . $habitacion->descripcion . '</td>
                <td>
                    <button type="button" class="btn btn-secondary bg-orange rounded-5 px-3" data-room-id="'. $habitacion->id .'" data-bs-toggle="modal" data-bs-target="#reservar'.  $habitacion->id  .'">RESERVAR</button>
                </td>
            </tr>';
        } // fin foreach
        $tabla .= '</tbody></table>';

        // Modal para reservar habitación
        $fecha_actual = date("Y-m-d");
        $fecha_max = date("Y-m-d", strtotime($fecha_actual . "+ 3 month"));
        $modal = 
        '<div class="modal fade" tabindex="-1" aria-hidden="true" id="reservar">
            <div class="modal-dialog">
                <form class="modal-content" action="" method="post">
                    <input type="hidden" id="id" name="id"/>
                    <div class="modal-header">
                        <p class="modal-title fs-5">RESERVAR HABITACIÓN</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex gap-3 flex-wrap">
                        <div class="d-flex flex-column gap-1">
                            <p class="fs-3">FECHA DE ENTRADA</p>
                            <input type="date" name="reserva_entrada" min="'. $fecha_actual .'" max="' . $fecha_max . '" required/>
                        <div>
                        <div class="d-flex flex-column gap-1">
                            <p class="fs-3">FECHA DE SALIDA</p>
                            <input type="date" name="reserva_salida" min="'. $fecha_actual .'" max="' . $fecha_max . '" required/>
                        <div>
                    <div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary bg-orange rounded-5 w-100" data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>';

        return $tabla . $modal;
    }


    public function build($hotel, $habitaciones) {
        // HEAD
        self::setScript(["./js/hotelrooms.js"]);
        self::setTitle($hotel->nombre);

        // BODY
        // Header
        $this->header = true;
        
        // Main
        $string = 
        '<main class="container p-5">
        <h1 class="mb-5">' . $hotel->nombre . '</h1>
            <article class="card border-secondary m-3 row rounded-5 d-flex flex-column">
                <div class="hotel__header overflow-hidden position-relative rounded-top-5 p-0">
                    <img src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->id .'" class="position-absolute w-100 z-0">
                    <div class="position-absolute z-1 p-5">
                        <p class="fw-bold fs-3">' . $hotel->nombre . '</p>
                        <p class="fs-4">' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                        <p class="fs-4">' . $hotel->direccion . '</p>
                    </div>
                </div>
                <div class="card-body p-5">
                        <p class="mb-5">' . $hotel->descripcion . '</p>'
                        . self::buildRoomsTable($habitaciones) . 
                '</div>
            </article>
        </main>';
        $this->main = $string;
    }
}