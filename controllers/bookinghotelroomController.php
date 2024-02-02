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
        if ( $_SERVER['REQUEST_METHOD']=='POST' ) {
            $reserva = unserialize($_POST['reserva']);
            $hotel = unserialize($_POST['hotel']);
            $habitación = unserialize($_POST['habitacion']);
        } else {
            header("Location: ./index.php?c=Bookings");
        }
        // Construir vista
        $this->bookinghotelroomView->build($reserva, $hotel, $habitacion);
        return $this->bookingsView;
    }
}














