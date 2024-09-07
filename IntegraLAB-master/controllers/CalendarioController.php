<?php

namespace Controllers;

use Model\Calendario;
use MVC\Router;

class CalendarioController {

    public static function index(Router $router) {
        $laboratorios = Calendario::all();
        imprimir($laboratorios);
    }

    public static function obtenerReservacion() {
        $id_lab = $_GET["id"];
        $Calendario = Calendario::where("id_lab", $id_lab, null);
        echo json_encode($Calendario);
    }
}

?>