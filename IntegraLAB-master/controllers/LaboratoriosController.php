<?php

namespace Controllers;

use Model\Laboratorios;
use Model\Usuarios;
use MVC\Router;

class LaboratoriosController {

    public static function index() {
        $laboratorios = Laboratorios::all();
        echo json_encode($laboratorios);
    }

    public static function verLaboratorio() {
        $id_laboratorio = $_GET["id"];
        $laboratorio = Laboratorios::find($id_laboratorio);
        echo json_encode($laboratorio);
    }

    public static function agregarLaboratorio() {
        $laboratorio = new Laboratorios($_POST);
        $resultado = $laboratorio->crear();
        if ($resultado["resultado"]) {
            header("Location: http://localhost:1000/adminxcampus?notification=asuccess");
        } else {
            header("Location: http://localhost:1000/adminxcampus?notification=error");
        }
    }

    public static function editarLaboratorio() {
        $labID = $_POST["eidlab"];
        $newArray["id"] = $_POST["eidlab"];
        $newArray["nom_lab"] = $_POST['elaboratorio'];
        $newArray["descripcion_laboratorio"] =  $_POST['edescripcion'];
        $newArray["id_campus"] =  $_POST['ecampus'];
        $newArray["id_encargado"] =  $_POST['eencargado'];
        $laboratorioActual = Laboratorios::find($labID);
        $laboratorioActual->sincronizar($newArray);
        $resultado = $laboratorioActual->actualizar($labID);
        if ($resultado["resultado"]) {
            header("Location: http://localhost:1000/adminxcampus?notification=esuccess");
        } else {
            header("Location: http://localhost:1000/adminxcampus?notification=error");
        }
    }

    public static function eliminarLaboratorio() {
        $labID = $_POST['labID'];
        $laboratorio = Laboratorios::find($labID);
        if($laboratorio) {
            $resultado = $laboratorio->eliminar($labID);
            if ($resultado) {
                http_response_code(200); // Código de respuesta HTTP 200 (OK)
            } else {
                // Enviar respuesta de error al cliente
                http_response_code(500); // Código de respuesta HTTP 500 (Internal Server Error)
            }
        }
    }

    public static function agregarEncargado() {
        $id_lab = $_POST["id_lab"];
        $encargado = new Usuarios($_POST);
        $encargado->setTipoUsuario(2);
        $encargado->setIdCampus($_SESSION["id_campus"] ?? 1);
        $encargado = $encargado->crear();
        $laboratorio = Laboratorios::find($id_lab);
        $laboratorio->actualizarRegistro($id_lab, "id_encargado", $encargado["id"]);
        echo json_encode($laboratorio);
    }

    public static function obtenerLaboratoriosConEncargados() {
        $id = $_GET["id"];
        $laboratorio = Laboratorios::find($id);
        echo json_encode($laboratorio);
    }
}
?>