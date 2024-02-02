<?php

include_once './views/view.php';

class BookingsView extends View{

    public function build() {
        
        // HEAD
        self::setTitle("Mis Reservas");

        // BODY
        // Header
        $this->header = true;

        //Main
        $main = '<h1>MIS RESERVAS</h1>';

        if (empty($_SESSION['reservas'])) {
            $main .= '<p class="fw-bold">ACTUALMENTE NO TIENES RESERVAS</p>';
        } else {

            foreach ($_SESSION['reservas'] as $reserva) {
                $main .= 
                '<article class="alert alert-light border-secondary m-3 row" role="alert">
                    <p class="fw-bold">' . $reserva["hotel"]->ciudad. ' - ' . $reserva["hotel"]->nombre . '</p>
                    <p class="fw-bold">FECHA DE ENTRADA: ' . $reserva["reserva"]->fecha_entrada . '</p>
                    <p class="fw-bold">FECHA DE SALIDA: ' . $reserva["reserva"]->fecha_salida . '</p>
                    <p>' . $reserva["habitacion"]->precio . '€</p>
                    <a class="btn btn-secondary w-100" href="./index.php?c=BookingHotelRoom&id="' . $reserva["reserva"]->id .'">Consultar</a>
                </article>';
            }
        }
        $this->main = $main . '<main>';
    }
}