<?php

class DirectoryView {

    public function imprimir($hoteles) {
    $salida = "";

        foreach ($hoteles as $hotel) {

            $salida .= 
            '<div class="alert alert-light border-secondary m-3 row" role="alert">
                <div class="col-4">
                    <img class="w-75" src="../../assets/images/carteles/'. $hotel->cartel .'" alt="'. $hotel->id .'">
                </div>
                <div class="col-8">
                    <p class="fw-bold">' . $hotel->nombre . '</p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <p>' . $hotel->descripcion . '</p>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nº</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>';

                foreach ($hotel->habitaciones as $habitacion) {

                    $salida .= 
                    '<tr>
                        <td>' . $habitacion->num_habitacion . '</td>
                        <td>' .$habitacion->tipo . '</td>
                        <td>' . $habitacion->precio . '</td>
                    </tr>';
                }

                $salida .= 
                            '</tbody>
                        </table>
                    </div>
                </div>';
            }

            echo $salida;
    }
}
