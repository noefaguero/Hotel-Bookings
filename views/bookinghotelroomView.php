<?php

include_once './views/view.php';

/**
 * Vista de la información de una reserva.
 */
class BookingHotelRoomView extends View {
    /**
     * Implementa el constructor de la clase View, para inicializar los elementos html principales.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Contruye los elementos HTML principales, incluido el main con la información de una reserva.
     *
     * @param  object $reserva Objeto de una reserva.
     * @param  object $hotel Objeto de un hotel. 
     * @param  object $habitacion Objeto de una habitación.
     * @return void
     */
    public function build($reserva, $hotel, $habitacion) {
        // HEAD
        self::setTitle("Reserva en " . $hotel->nombre);

        // BODY
        // Header
        $this->header = true;

        // Main
        include_once './lib/functions/formatDate.php';
        $main = 
        '<main class="container p-5 w-75">
            <h1 class="mb-5 text-center">' . 'Reserva en ' . $hotel->nombre . '</h1>
            <div class="alert bg-card border-secondary m-3 p-5 rounded-5">
                <div class="d-flex justify-content-between px-3">
                    <p class="fw-bold fs-5 m-0">ENTRADA</p>
                    <p class="fs-5 m-0">' . formatDate($reserva->fecha_entrada) . '</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between px-3">
                    <p class="fw-bold fs-5 m-0">SALIDA</p>
                    <p class="fs-5 m-0">' . formatDate($reserva->fecha_salida) . '</p>
                </div>
                <hr>
                <div class="px-3">
                    <p class="fw-bold fs-5 mb-3"> DIRECCIÓN </p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <hr>
                    <p class="fw-bold fs-5 mb-3"> HABITACIÓN </p>
                    <p> Nº ' . $habitacion->num_habitacion . ' - ' .$habitacion->tipo . '</p>
                    <p>' . $habitacion->descripcion . '</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between px-3">
                    <p class="fw-bold fs-5 m-0">PRECIO</p>
                    <p class="fs-5 m-0">' . $habitacion->precio . '€</p>
                </div>
                <hr>
                <div class="d-flex justify-content-center pt-5">
                    <button type="button" class="btn btn-secondary rounded-5" data-bs-toggle="modal" data-bs-target="#anular">Anular Reserva</button>
                </div>
            </div>
        </main>';

        $modal = 
        '<div class="modal fade" id="anular" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-card rounded-5">
                    <div class="modal-header">
                        <p class="modal-title fs-5">ANULAR RESERVA</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Confirmas la anulación de la reserva?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Cancelar</button>
                        <form action="./index.php?c=Bookings&a=delete" method="post">
                            <input type="hidden" name="id" value="' . $reserva->id . '">
                            <button class="btn btn-danger rounded-5" data-bs-dismiss="modal">Anular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';

        $this->main = $main . $modal;
    }
}