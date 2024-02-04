<?php

include_once './controllers/controller.php';
include_once './models/roomsModel.php';
include_once './models/hotelsModel.php';
include_once './views/bookinghotelroomView.php';


class BookingHotelRoom extends Controller {
    
    private $bookingsModel;
    private $hotelsModel;
    private $roomsModel;
    private $bookinghotelroomView;

    public function __construct() {
        $this->bookinghotelroomView = new BookingHotelRoomView();
    }

    public function show() {
        // Autorización
        self::verify();
        // Obtener objetos
        if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
            $reserva = filter_input(INPUT_GET, 'reserva', FILTER_SANITIZE_STRING);
            $hotel = filter_input(INPUT_GET, 'hotel', FILTER_SANITIZE_STRING);
            $habitación = filter_input(INPUT_GET, 'habitacion', FILTER_SANITIZE_STRING);
        } else {
            header("Location: ./index.php?c=Bookings");
            exit;
        }
        // Construir vista
        $this->bookinghotelroomView->build($reserva, $hotel, $habitacion);
        return $this->bookingsView;
    }
}














