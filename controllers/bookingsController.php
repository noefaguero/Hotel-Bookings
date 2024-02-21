<?php

include_once './controllers/controller.php';
include_once './models/bookingsModel.php';
include_once './models/hotelsModel.php';
include_once './models/roomsModel.php';
include_once './views/bookingsView.php';

/**
 * Controlador para la gestión de reservas.
 */
class BookingsController extends Controller {
        
    /** 
     * @var object Modelo de reservas.
     */
    private $bookingsModel;
        
    /** 
     * @var object Modelo de habitaciones.
     */
    private $roomsModel;

    /** 
     * @var object Modelo de hoteles.
     */
    private $hotelsModel;

    /** 
     * @var object Vista de reservas.
     */
    private $bookingsView;

    /**
     * Inicializa las instancias del modelo y la vista de reservas.
     */
    public function __construct() {
        $this->bookingsModel = new BookingsModel();
        $this->bookingsView = new BookingsView();
    }
        
    /**
     * Controla la visualización de las reservas de un usuario
     *
     * @param  string|null $msg Mensaje de estado de operación de modificación de las reservas por parte del usuario.
     * @return object Vista de las reservas.
     */
    public function show($msg=null) {
        // Autorización
        if (!$msg) self::verify();
        // Obtener objetos de reservas de la BD
        $reservas = $this->bookingsModel->getAllBookings($_SESSION['usuario']->id);
        // Recorrer array de reservas
        if (count($reservas) == 0) {
            $bookingsList = null;
        } else {
            $this->hotelsModel = new HotelsModel();
            $this->roomsModel = new RoomsModel();
            $bookingsList = '';
            foreach ($reservas as $reserva) {
                // Obtener objeto del hotel
                $hotel = $this->hotelsModel->getHotel($reserva->id_hotel);
                // Obtener objeto de la habitación
                $habitacion = $this->roomsModel->getRoom($reserva->id_habitacion);
                // Guardar tarjeta de reserva 
                $bookingsList .= $this->bookingsView->buildBooking($reserva, $hotel, $habitacion);
            }
        }
        // Construir vista
        $this->bookingsView->build($bookingsList, $msg);

        return $this->bookingsView;
    }
    
    /**
     * Controla la inserción de una nueva reserva.
     *
     * @return object Vista de las reservas después de la inserción.
     */
    public function insert() {
        // Autorización
        self::verify();
        
        // Obtener entradas
        $id_hab = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $fecha_entrada = filter_input(INPUT_POST, 'reserva_entrada', FILTER_SANITIZE_STRING);
        $fecha_salida = filter_input(INPUT_POST, 'reserva_salida', FILTER_SANITIZE_STRING);
        
        // Insertar la reserva en la base de datos y recoger el mensaje
        $msg = $this->bookingsModel->insert($id_hab, $fecha_entrada, $fecha_salida);
        
        // Mostrar todas las reservas y el mensaje de confirmación
        return self::show($msg);
    }
    
    /**
     * Controla la eliminación de una reserva.
     *
     * @return object Vista de las reservas después de la eliminación.
     */
    public function delete() {
        // Autorización
        self::verify();
        
        // Obtener entrada
        $id_reserva = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        
        // Eliminar la reserva de la base de datos y recoger el mensaje
        $msg = $this->bookingsModel->delete($id_reserva);
        
        // Mostrar todas las reservas y el mensaje de confirmación
        return self::show($msg);
    }
}