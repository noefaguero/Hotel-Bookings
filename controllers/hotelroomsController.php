<?php

include_once './models/hotelsModel.php';
include_once './views/hotelsView.php';
include_once './models/roomsModel.php';
include_once './views/roomsView.php';

class HotelRoomsController {
    
    private $hotelsModel;
    private $hotelsView;
    private $roomsModel;
    private $roomsView;

    public function __construct() {
        $this->hotelsModel = new HotelsModel();
        $this->hotelsView = new HotelsView();
        $this->roomsModel = new RoomsModel();
        $this->roomsView = new RoomsView();
    }

    public function verify() {
        // Unirse a la sesión
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['usuario'])) {
            header("Location: ./index.php");
            exit;
        }
    }

    public function show() { // muestra un hotel y todas sus habitaciones
        // Autorización
        self::verify();
        // Obtener id del hotel
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        // Obtener objetos
        $hotel = $this->hotelsModel->getHotel($id);
        $this->hotelsModel->closeConnection();
        $habitaciones = $this->hotelsModel->getAllHotelRooms($id);
        $this->roomsModel->closeConnection();
        // Imprimir
        $habitacionesView = $this->roomsView->createView($habitaciones);
        $this->hotelsView->printHotel($hotel, $habitacionesView);
        exit;
    }
}














