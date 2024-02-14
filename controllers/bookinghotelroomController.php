<?php

include_once './controllers/controller.php';
include_once './models/bookingsModel.php';
include_once './models/roomsModel.php';
include_once './models/hotelsModel.php';
include_once './views/bookinghotelroomView.php';


class BookingHotelRoomController extends Controller {
    
    private $bookingsModel;
    private $hotelsModel;
    private $roomsModel;
    private $bookinghotelroomView;

    public function __construct() {
        $this->bookingsModel = new BookingsModel();
        $this->hotelsModel = new HotelsModel();
        $this->roomsModel = new RoomsModel();
        $this->bookinghotelroomView = new BookingHotelRoomView();
    }

    public function show() {
        // Autorización
        self::verify();
        // Obtener objetos
        if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $reserva = $this->bookingsModel->getBooking($id);
            $hotel = $this->hotelsModel->getHotel($reserva->id_hotel);
            $habitacion = $this->roomsModel->getRoom($reserva->id_habitacion);
        } else {
            header("Location: ./index.php?c=Bookings");
            exit;
        }
        // Construir vista
        $this->bookinghotelroomView->build($reserva, $hotel, $habitacion);
        return $this->bookinghotelroomView;
    }
}














