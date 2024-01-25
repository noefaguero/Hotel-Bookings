<?php

include_once './models/roomsModel.php';
include_once './views/roomsView.php';

class RoomsController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->view = new RoomsView();
        $this->model = new RoomsModel();
    }

    public function show($hotel) { // showAllRooms de un hotel específico
        $habitacionesHotel = $this->model->getHotelRooms($hotel);
        return $this->view->createView($habitacionesHotel);
    }
}














