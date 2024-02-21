<?php

/**
 * Formatea el input de una fecha a español
 *
 * @param  mixed $fecha
 * @return void
 */
function formatDate($fecha) {
    
    // Días y meses en español
    $dias = array('domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado');
    $meses = array('', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    // Convertir la fecha a un objeto DateTime
    $fecha_obj = new DateTime($fecha);

    $nombre_dia = $dias[$fecha_obj->format('w')];
    $nombre_mes = $meses[$fecha_obj->format('n')];
    $dia = $fecha_obj->format('d');

    // Formatear
    return $nombre_dia . ', ' . $dia . ' de ' . $nombre_mes;
}
