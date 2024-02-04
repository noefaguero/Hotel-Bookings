<?php

include_once './views/view.php';

class BookingHotelRoomView extends View{

    public function build($reserva, $hotel, $habitacion) {
        
        // HEAD
        self::setTitle("Reserva en " . $hotel->nombre);

        // BODY
        // Header
        $this->header = true;

        // Main
        $string = 
        '<main class="container p-5">
            <h1 class="mb-5 ms-5">' . 'Reserva en ' . $hote->nombre . '</h1>
            <article class="alert alert-light border-secondary m-3 row rounded-5">
                <p class="fw-bold">' . $hotel->nombre . '</p>
                <p class="fw-bold">FECHA DE ENTRADA: ' . $reserva->fecha_entrada . '</p>
                <p class="fw-bold">FECHA DE SALIDA: ' . $reserva->fecha_salida . '</p>
                <p>' . $habitacion->precio . '€</p>
                <h2 class=fs-3> DIRECCIÓN </h2>
                <hr>
                <p>' . $hotel->direccion . '</p>
                <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                <h2 class=fs-3> HABITACIÓN </h2>
                <hr>
                <p> Nº' . $habitacion->num_habitacion . '</p>
                <p>' .$habitacion->tipo . '</p>
                <p>' . $habitacion->descripcion . '</p>
            <article>';

        $this->main = $string . '</main>';
    }
}