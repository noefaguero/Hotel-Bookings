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
        $this->bookingsView = new BookingsView();
    }
    
    public function show($msg=null) {
        // Autorización
        if (!$msg) self::verify();
        // Obtener objetos de reservas de la BD
        $this->bookingsModel = new BookingsModel();
        $reservas = $this->bookingsModel->getAllBookings($_SESSION['usuario']->id);
        // Recorrer array de reservas
        if (count($reservas) == 0) {
            $bookingsList = null;
        } else {
            $bookingsList = '';
            foreach ($reservas as $reserva) {
                // Obtener objeto del hotel
                $this->hotelsModel = new HotelsModel();
                $hotel = $this->hotelsModel->getHotel($reserva->id_hotel);
                // Obtener objeto de la habitación
                $this->roomsModel = new RoomsModel();
                $habitacion = $this->roomsModel->getRoom($reserva->id_habitacion);
                // Guardar tarjeta de reserva 
                $bookingsList .= $this->bookingsView->buildBooking($reserva, $hotel, $habitacion);
            }
        }
        // Construir vista
        $this->bookingsView->build($bookingsList, $msg);

        return $this->bookingsView;
    }

    public function insert() {
        // Autorización
        self::verify();
        // Obtener entradas
        $id_hab = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $fecha_entrada = filter_input(INPUT_POST, 'reserva_entrada', FILTER_SANITIZE_STRING);
        $fecha_salida = filter_input(INPUT_POST, 'reserva_salida', FILTER_SANITIZE_STRING);
        // Insertar la reserva en la base de datos
        $this->bookingsModel = new BookingsModel();
        $this->bookingsModel->insert($id_hab, $fecha_entrada, $fecha_salida);
        // Mostrar todas las reservas
        return self::show("LA RESERVA SE HA REALIZADO CORRECTAMENTE");
    }

    public function delete() {
        // Autorización
        self::verify();
        // Obtener entrada
        $id_reserva = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        // Eliminar la reserva de la base de datos
        $this->bookingsModel = new BookingsModel();
        $this->bookingsModel->delete($id_reserva);
        // Mostrar mensaje de confirmación
        return self::show("LA RESERVA SE HA ELIMINADO");
    }
}