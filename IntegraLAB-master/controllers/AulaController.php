<?php

namespace Controllers;

use Model\Aulas;
use Model\Reservacion;
use MVC\Router;

class AulaController {

    public static function obtenerAulasLaboratorio() {
        $id_lab = $_GET["id"];
        $aulas = Aulas::where("id_lab", $id_lab, null);
        echo json_encode($aulas);
    }
    public static function getAula() {
        $id = $_GET["id"];
        $aula = Aulas::find($id);
        echo json_encode($aula);
    }
    public static function guardarAula() {
        $aula = new Aulas($_POST);
        $respusta = $aula->crear();
        echo json_encode($respusta);
    }
    public static function actualizarAula() {
        $aula = Aulas::find($_POST["id"]);
        $aula->sincronizar($_POST);
        $respusta = $aula->actualizar($_POST["id"]);
        echo json_encode($respusta);
    }
    public static function eliminarAula() {
        $aula = Aulas::find($_POST["id_aula"]);
        $reservaciones = Reservacion::where("id_aula", $aula->id);
        $errores = [];
        if(!empty($reservaciones)) {
            $errores["code"] = 500;
            $errores["message"] = "Hay reservaciones con este laboratorio";
            echo json_encode($errores);
        } else {
            $resultado = $aula->eliminar();
            echo json_encode($resultado);
        }
    }
}

?>