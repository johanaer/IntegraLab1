<?php

namespace Controllers;

use Model\Solicitud;

class SolicitudController {

    public static function index() {
        $reservaciones = Solicitud::all();
        echo json_encode($reservaciones);
    }

    public static function guardar() {
        $solicitud = new Solicitud($_POST);
        $respuesta = $solicitud->crear();
        echo json_encode($respuesta);
    }
}

?>