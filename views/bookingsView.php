<?php

include_once './views/view.php';

class BookingsView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function buildBooking($reserva, $hotel, $habitacion) {
        return 
            '<article class="alert alert-light border-secondary m-3 p-4 rounded-5">
                <p class="fw-bold fs-3">' . $hotel->ciudad. ' - ' . $hotel->nombre . '</p>
                <p class="fw-bold">FECHA DE ENTRADA: ' . $reserva->fecha_entrada . '</p>
                <p class="fw-bold">FECHA DE SALIDA: ' . $reserva->fecha_salida . '</p>
                <a class="btn btn-secondary bg-orange rounded-5 w-100 fs-4" href="./index.php?c=BookingHotelRoom&id=' . $reserva->id .'">Consultar</a>
            </article>';
    }

    public function build($bookingsList, $msg=null) {
        
        // HEAD
        self::setTitle("Mis Reservas");

        // BODY
        // Header
        $this->header = true;

        //Main
        $main = 
        '<main class="container p-5 w-75">
            <h1 class="mb-3 ms-3">Mis Reservas</h1>
            <section class="d-flex flex-column gap-2">';

        if ($msg) {
            $main .= 
            '<div class="alert bg-orange p-5 m-3 rounded-5 alert-dismissible fade show" role="alert">' 
            . $msg . 
            '<button type="button" class="btn-close p-5 opacity-100" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        $main .= $bookingsList ? $bookingsList : '<p class="fw-bold p-3">ACTUALMENTE NO TIENES RESERVAS</p>';
        
        $this->main = $main . '</section></main>';
    }
}