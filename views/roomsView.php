<?php

class RoomsView {

    public function createView($habitacionesHotel) {

        if (count($habitacionesHotel) == 0) {
            return (
            '<div class="alert alert-secondary p-3" role="alert">
                <p>En estos momentos no hay habitaciones disponibles en este hotel</p>
            </div>');
        }
        
        // Tabla de habitaciones
        $tabla = 
        '<table class="table table-hover">
            <thead class="table__header rounded">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>';
        // Habitaciones
        foreach ($habitacionesHotel as $habitacion) {
            $tabla .= 
            '<tr>
                <td>' . $habitacion->num_habitacion . '</td>
                <td>' .$habitacion->tipo . '</td>
                <td>' . $habitacion->precio . '€</td>
                <td>' . $habitacion->descripcion . '</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#reservar'.  $habitacion->id  .'">RESERVAR</button>
                <td>
            </tr>';
        } // fin foreach
        $tabla .= '</tbody></table>';

        // Modal para reservar habitación
        $fecha_actual = date("Y-m-d");
        $fecha_max = date("Y-m-d", strtotime($fecha_actual . "+ 3 month"));
        $modal = 
        '<div class="modal fade" id="reservar" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title fs-5">RESERVAR HABITACIÓN</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body d-flex gap-3 flex-wrap">
                            <div class="d-flex flex-column gap-1">
                                <p class="fs-3">FECHA DE ENTRADA</p>
                                <input type="date" name="reserva_entrada" min="'. $fecha_actual .'" max="' . $fecha_max . '" required/>
                            <div>
                            <div class="d-flex flex-column gap-1">
                                <p class="fs-3">FECHA DE SALIDA</p>
                                <input type="date" name="reserva_salida" min="'. $fecha_actual .'" max="' . $fecha_max . '" required/>
                            <div>
                        <div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100" data-bs-dismiss="modal">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';

        return $tabla . $modal;
    }
}