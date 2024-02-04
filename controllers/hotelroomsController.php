<?php

include_once './controllers/controller.php';
include_once './models/hotelsModel.php';
include_once './models/roomsModel.php';
include_once './views/hotelroomsView.php';

class HotelRoomsController extends Controller {
    
    private $hotelsModel;
    private $roomsModel;
    private $view;

    public function __construct() {
        $this->hotelsModel = new HotelsModel();
        $this->roomsModel = new RoomsModel();
        $this->view = new HotelRoomsView();
    }

    public function show() { // muestra un hotel y todas sus habitaciones
        // Autorización
        self::verify();
        // Obtener id del hotel
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        // Obtener objetos
        $hotel = $this->hotelsModel->getHotel($id);
        $habitaciones = $this->roomsModel->getAllRooms($id);
        // Contruir vista
        $this->view->build($hotel, $habitaciones);
        return $this->view;
    }

    public function insert() {
        
    }
}










