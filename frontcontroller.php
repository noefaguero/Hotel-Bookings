<?php

include 'controllers/TareasController.php';
include 'models/TareasModel.php';
include 'views/TareasView.php';

// Definir la acción por defecto
define('ACCION_DEFECTO', 'listar');
// Definir el controlador por defecto
define('CONTROLADOR_DEFECTO', 'Tareas');


function lanzarAccion($controllerObj){
    
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}


function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}


// Carga el controlador especificado y devuelve una instancia del mismo
function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        die ("controlador no válido");
    }
}

// Carga el controlador y la acción correspondientes
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}

