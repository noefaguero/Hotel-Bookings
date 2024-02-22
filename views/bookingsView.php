<?php

include_once './views/view.php';

/**
 * Vista del listado de reservas de un usuario.
 */
class BookingsView extends View {
    /**
     * Implementa el constructor de la clase View, para inicializar los elementos HTML principales.
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Contruye un article HTML con la información de una reserva.
     *
     * @param  object $reserva Objeto de una reserva.
     * @param  object $hotel Objeto de un hotel. 
     * @param  object $habitacion Objeto de una habitación.
     * @return string  Article HTML de una reserva.
     */
    public function buildBooking($reserva, $hotel, $habitacion) {
        include_once './lib/functions/formatDate.php';
        return 
            '<article class="alert alert-light border-secondary m-3 p-4 rounded-5">
                <h2 class="fw-bold fs-3">' . $hotel->ciudad. ' - ' . $hotel->nombre . '</h2>
                <p class="fw-bold">FECHA DE ENTRADA: ' . formatDate($reserva->fecha_entrada) . '</p>
                <p class="fw-bold">FECHA DE SALIDA: ' . formatDate($reserva->fecha_salida) . '</p>
                <a class="btn btn-secondary bg-orange rounded-5 w-100 fs-4" href="./index.php?c=BookingHotelRoom&id=' . $reserva->id .'">Consultar</a>
            </article>';
    }
    
    /**
     * Contruye los elementos HTML principales, incluido el main con el listado de reservas.
     *
     * @param  array $bookingsList Array de cadenas, que representan los articles HTML de cada reserva.
     * @param  string $msg Mensaje de estado de las operaciones de modificación de las reservas por parte del usuario.
     * @return void
     */
    public function build($bookingsList, $msg=null) {
        // HEAD
        self::setTitle("Mis Reservas");

        // BODY
        // Header
        $this->header = true;

        //Main
        $main = 
        '<main class="container p-5 w-75">
            <h1 class="mb-5 text-center">Mis Reservas</h1>
            <div class="d-flex flex-column gap-2">';

        if ($msg) {
            $main .= 
            '<div class="alert bg-orange text-center p-4 m-3 rounded-5 alert-dismissible fade show" role="alert">
                <p class="m-0">' . $msg . '</p>
                <button type="button" class="btn-close p-4 opacity-100" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        $main .= $bookingsList ? $bookingsList : '<p class="fw-bold p-3">ACTUALMENTE NO TIENES RESERVAS</p>';
        
        $this->main = $main . '</div></main>';
    }
}