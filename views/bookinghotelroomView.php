<?php

include_once './views/view.php';

class BookingHotelRoomView extends View {

    public function build($reserva, $hotel, $habitacion) {
        
        // HEAD
        self::setTitle("Reserva en " . $hotel->nombre);

        // BODY
        // Header
        $this->header = true;

        // Main
        $main = 
        '<main class="container p-5 w-75">
            <h1 class="mb-5 ms-3">' . 'Reserva en ' . $hotel->nombre . '</h1>
            <article class="alert bg-card border-secondary m-3 p-5 rounded-5">
                <div class="d-flex justify-content-between">
                    <h2 class="fw-bold fs-5 m-0">ENTRADA</h2>
                    <p class="fs-5 m-0 pe-3">' . $reserva->fecha_entrada . '</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h2 class="fw-bold fs-5 m-0">SALIDA</h2>
                    <p class="fs-5 m-0 pe-3">' . $reserva->fecha_salida . '</p>
                </div>
                <hr>
                <h2 class="fw-bold fs-5 mb-3"> DIRECCIÓN </h2>
                <p>' . $hotel->direccion . '</p>
                <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                <hr>
                <h2 class="fw-bold fs-5 mb-3"> HABITACIÓN </h2>
                <p> Nº ' . $habitacion->num_habitacion . ' - ' .$habitacion->tipo . '</p>
                <p>' . $habitacion->descripcion . '</p>
                <hr>
                <div class="d-flex justify-content-between">
                    <h2 class="fw-bold fs-5 m-0">PRECIO</h2>
                    <p class="fs-5 m-0 pe-3">' . $habitacion->precio . '€</p>
                </div>
                <hr>
                <div class="d-flex justify-content-center pt-5">
                    <button type="button" class="btn btn-secondary rounded-5" data-bs-toggle="modal" data-bs-target="#anular">Anular Reserva</button>
                </div>
            </article>
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
                            <input type="hidden" name="id" value="' . $reserva->id . '"/>
                            <button class="btn btn-danger rounded-5" data-bs-dismiss="modal">Anular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';

        $this->main = $main . $modal;
    }
}