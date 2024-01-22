<?php

// Lista blanca de controladores
$controladores = ["Login", "Directory", "Error"];

// Definir controlador
$nombreControlador = 'Login'; // por defecto
if (isset($_GET["c"])) {
    $nombreControlador = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
    if (!in_array($nombreControlador, $controladores)) die("controlador no válido");
} 

// Cargar documentos
$section = strtolower($nombreControlador);

$model_path = $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles/models/' . $section . 'Model.php';
$controller_path = $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles//controllers/' . $section . 'Controller.php';
$view_path = $_SERVER['DOCUMENT_ROOT'] . '/6_2_ReservaHoteles/views/' . $section . 'View.php';

if (is_file($model_path)) include_once $model_path;
include_once $controller_path;
include_once $view_path;

// Instanciar controlador especificando su nombre
$claseControlador = $nombreControlador . 'Controller';
$objControlador = new $claseControlador();

// Definir acción
$accion = "mostrar"; // por defecto
if (isset($_GET['a'])) {
    $accion = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    if (!method_exists($objControlador, $accion)) die("accion no válida");
}

// LLamada a la acción a partir del objeto del controlador
$objControlador->$accion();