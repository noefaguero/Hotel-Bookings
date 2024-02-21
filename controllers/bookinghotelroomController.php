<?php

include_once './controllers/controller.php';
include_once './models/bookingsModel.php';
include_once './models/roomsModel.php';
include_once './models/hotelsModel.php';
include_once './views/bookinghotelroomView.php';

/**
 * Controlador para la gestión de la visualización de la información de una reserva.
 */
class BookingHotelRoomController extends Controller {
    
    /** 
     * @var BookingsModel Modelo de reservas.
     */
    private $bookingsModel;
        
    /** 
     * @var HotelsModel Modelo de hoteles.
     */
    private $hotelsModel;
    
    /** 
     * @var RoomsModel Modelo de habitaciones.
     */
    private $roomsModel;
    
    /** 
     * @var BookingHotelRoomView Vista para la visualización de detalles de una reserva.
     */
    private $bookinghotelroomView;

    /**
     * Inicializa las instancias de los modelos y la vista.
     */
    public function __construct() {
        $this->bookingsModel = new BookingsModel();
        $this->hotelsModel = new HotelsModel();
        $this->roomsModel = new RoomsModel();
        $this->bookinghotelroomView = new BookingHotelRoomView();
    }

    /**
     * Controla la visualización de los detalles de una reserva.
     *
     * @return object Vista de detalles de una reserva.
     */
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














