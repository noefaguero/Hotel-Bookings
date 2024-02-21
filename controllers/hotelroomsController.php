<?php

include_once './controllers/controller.php';
include_once './models/hotelsModel.php';
include_once './models/roomsModel.php';
include_once './views/hotelroomsView.php';


/**
 * Controlador para la gestión de habitaciones de un hotel.
 */
class HotelRoomsController extends Controller {
    
    /** 
     * @var object Modelo de hoteles. 
     */
    private $hotelsModel;
    
    /** 
     * @var object Modelo de habitaciones. 
     */
    private $roomsModel;
    
    /** 
     * @var object Vista de habitaciones de hotel. 
     */
    private $view;

    /**
     * Inicializa las instancias del modelos y la vista.
     */
    public function __construct() {
        $this->hotelsModel = new HotelsModel();
        $this->roomsModel = new RoomsModel();
        $this->view = new HotelRoomsView();
    }

    /**
     * Controla la visualización de un hotel y sus habitaciones.
     *
     * @return object Vista de un hotel y sus habitaciones.
     */
    public function show() { 
        // Autorización
        self::verify();
        
        // Obtener id del hotel
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        
        // Obtener objetos
        $hotel = $this->hotelsModel->getHotel($id);
        $habitaciones = $this->roomsModel->getAllRooms($id);
        
        // Construir vista
        $this->view->build($hotel, $habitaciones);
        return $this->view;
    }
}










