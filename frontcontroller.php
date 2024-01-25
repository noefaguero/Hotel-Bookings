<?php
// Lista blanca de controladores
$controladores = ["Users", "Hotels", "HotelRooms", "Errors"];

// Definir controlador
$nombreControlador = 'Users'; // controlador del login por defecto
if (isset($_GET["c"])) {
    $nombreControlador = filter_input(INPUT_GET, "c", FILTER_SANITIZE_STRING);
    if (!in_array($nombreControlador, $controladores)) {
        header('Location: ./index.php?c=Errors');
        exit;
    };
} 

// Cargar documento del controlador
include_once './controllers/' . strtolower($nombreControlador) . 'Controller.php';

// Instanciar controlador especificando su nombre
$claseControlador = $nombreControlador . 'Controller';
$objControlador = new $claseControlador();

// Definir acción
$accion = "show"; // acción por defecto
if (isset($_GET['a'])) {
    $accion = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    if (!method_exists($objControlador, $accion)) {
        header('Location: ./index.php?c=Errors');
        exit;
    }
}

// Llamada a la acción a partir del objeto del controlador
$objControlador->$accion();

