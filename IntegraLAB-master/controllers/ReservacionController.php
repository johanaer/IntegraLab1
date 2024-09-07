<?php

namespace Controllers;

use Model\Reservacion;
use Model\Usuarios;

class ReservacionController {

    public static function index() {
        $reservaciones = Reservacion::all();
        echo json_encode($reservaciones);
    }

    public static function obtenerReservacionesFecha() {        
        $reservaciones = Reservacion::whereAnd($_GET);
        echo json_encode($reservaciones);
    }
    public static function guardarReservacion() {
        session_start();
        $username = $_SESSION["login_user"] ?? null;
        $usuario = Usuarios::where("nom_usuario", $username);
        $_POST["id_usuario"] = $usuario[0]->id;
        $reservacion = new Reservacion($_POST);
        $resultado = $reservacion->crear();
        echo json_encode($resultado);
    }
}

?>