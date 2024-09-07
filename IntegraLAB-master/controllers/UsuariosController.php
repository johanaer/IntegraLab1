<?php

namespace Controllers;

use Model\Usuarios;

class UsuariosController {

    public static function index() {
        $usuarios = Usuarios::all();
        echo json_encode($usuarios);
    }

    public static function getUsuario() {
        $id = $_GET["id"];
        $usuario = Usuarios::find($id);
        echo json_encode($usuario);
    }
    public static function agregarUsuario() {
        $id = $_SESSION["id_usuario"] ?? null;;
        $usuario = Usuarios::find($id);
        $profesor = new Usuarios($_POST);
        $profesor->setIdCampus($usuario["id_campus"]);
        $profesor->setTipoUsuario(3);
        $resultado = $profesor->crear();
        echo json_encode($resultado);
    }
    public static function getUsuariosLaboratorios() {
        $id = $_GET["id"];
        $usuario = Usuarios::where("id_lab", $id);
        echo json_encode($usuario);
    }
    public static function actualizarUsuario() {
        $id = $_POST["id"];
        $usuario = Usuarios::find($id);
        $usuario->sincronizar($_POST);
        $respuesta = $usuario->actualizar($id);
        echo json_encode($respuesta);
    }
}

?>