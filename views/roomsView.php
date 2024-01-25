<?php

class RoomsView {

    public function createView($habitacionesHotel, $hotel) {

        if (count($habitacionesHotel) > 0) {        
            $salida = 
            '<table class="table table-hover">
                <thead class="table__header rounded">
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($habitacionesHotel as $habitacion) {
                $salida .= 
                '<tr>
                    <td>' . $habitacion->num_habitacion . '</td>
                    <td>' .$habitacion->tipo . '</td>
                    <td>' . $habitacion->precio . '€</td>
                    <td>' . $habitacion->descripcion . '</td>
                </tr>';
            } // fin foreach

            $salida .= '</tbody></table>';

        } else {
            $salida = '<div class="alert alert-secondary p-3" role="alert"><p>En estos momentos ' . $hotel->nombre . ' no tiene habitaciones disponibles.<p/></div>';
        }
    }
}