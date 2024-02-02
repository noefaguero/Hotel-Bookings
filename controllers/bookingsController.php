<?php

include_once './controllers/controller.php';
include_once './models/bookingsModel.php';
include_once './models/hotelsModel.php';
include_once './models/roomsModel.php';
include_once './views/bookingsView.php';


class BookingsController extends Controller {
    
    private $bookingsModel;
    private $roomsModel;
    private $hotelsModel;
    private $bookingsView;

    public function __construct() {
        $this->bookingsModel = new BookingsModel();
        $this->bookingsView = new BookingsView();
        $this->hotelsModel = new HotelsModel();
    }

    public function show() {
        // Autorización
        self::verify();
        // Obtener objetos de reservas de la BD
        $reservas = $this->bookingsModel->getAllBookings($_SESSION['usuario']->id);
        // Recorrer array de reservas
        $_SESSION['reservas'] = [];
        foreach ($reservas as $reserva) {
            // Obtener objeto del hotel a partir del array guardado en sesión
            $hotel = $this->hotelsModel->getHotel($reserva->id_hotel);
            // Obtener objeto de la habitación
            $this->roomsModel = new RoomsModel();
            $habitacion = $this->roomsModel->getRoom($reserva->id_habitacion);
            // Guardar reserva en sesión
            array_push($_SESSION['reservas'], ["reserva" => $reserva, "hotel" => $hotel, "habitacion" => $habitacion]);
        }
        $this->bookingsView->build();

        return $this->bookingsView;
    }
}