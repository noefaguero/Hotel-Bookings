<?php

class HotelsView {

    public function print($hoteles) { // printAllHotels
        
        $salida = "";

        foreach ($hoteles as $hotel) {
            $salida .= 
            '<div class="alert alert-light border-secondary m-3 row">
                <div class="col-md-6">
                    <img class="w-75 hotel__img" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->nombre .'">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <p class="fw-bold">' . $hotel->nombre . '</p>
                    <p>' . $hotel->direccion . '</p>
                    <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                    <p>' . $hotel->descripcion . '</p>
                    <p>Nº de habitaciones: ' . $hotel->num_habitaciones . '</p>
                    <form method="post" action="index.php?c=HotelRooms" class="d-flex justify-content-center py-5">
                        <input type="hidden" name="id" value="' . $hotel->id . '"/>
                        <input type="submit" class="btn btn-primary">VER HABITACIONES</input>
                    </form>
                </div>
            </div>';
        } // fin foreach
        echo $salida;
    }

    public function printHotel($hotel, $habitacionesView) {

        $salida = 
        '<div class="alert alert-light border-secondary m-3 row" role="alert">
            <div class="col-md-6">
                <img class="w-75 hotel__img" src="data:image/jpg;base64,' . base64_encode($hotel->foto) .'" alt="'. $hotel->id .'">
            </div>
            <div class="col-md-6">
                <p class="fw-bold">' . $hotel->nombre . '</p>
                <p>' . $hotel->direccion . '</p>
                <p>' . $hotel->ciudad . ', ' . $hotel->pais . '</p>
                <p>' . $hotel->descripcion . '</p>';

        echo $habitacionesView;
        
        $salida .= '</div></div>';
        echo $salida;
    }
}
