<?php

namespace Controllers;

use Model\Aulas;
use Model\Campus;
use Model\Laboratorios;
use Model\Materiales;
use Model\Reservacion;
use Model\Usuarios;
use MVC\Router;


class AppViewsController {
    public static function index(Router $router) {
        $router->render("index", []);
    }

    public static function login(Router $router) {
        $router->render("login/login", []);
    }
    public static function logout(Router $router) {
        $router->render("login/logout", []);
    }

    public static function logue(Router $rouer) {
        $rouer->render("logeo/logeo");
    }

    public static function olvide_contraseña(Router $router) {
        $router->render("login/recuperarContraseña", []);
    }

    public static function dashboard(Router $router) {
        session_start();
        $username = $_SESSION["login_user"] ?? null;
        $usuario = Usuarios::where("nom_usuario", $username);
        $router->render("interfaz_principal/interfaz_principal", [
            "usuario" => $usuario[0]
        ]);
    }
    
    public static function calendario(Router $router) {
        $router->render("calendario/calendario", []);
    }

    public static function laboratorio(Router $router) {
        $laboratorios = Laboratorios::all();
        $router->render("laboratorios/laboratorio", [
            "laboratorios" => $laboratorios
        ]);
    }

    public static function materiales(Router $router) {
        $materiales = Materiales::all();
        $router->render("laboratorios/materiales", [
            "materiales" => $materiales
        ]);
    }

    public static function actividades(Router $router) {
        session_start();
        $username = $_SESSION["login_user"] ?? null;
        $usuario = Usuarios::where("nom_usuario", $username);
        $actividades = Reservacion::where("id_usuario", $usuario[0]->id);
        $laboratorios = Laboratorios::all();
        $aulas = Aulas::all();
        $router->render("actividades/actividades", [
            "actividades" => $actividades,
            "laboratorios" => $laboratorios,
            "aulas" => $aulas
        ]);
    }

    public static function historial(Router $router) {
        $router->render("actividades/historial", []);
    }

    public static function reporte(Router $router) {
        $router->render("reporte/quejas_sugerencias", []);
    }

    public static function administrador(Router $router) {
        $laboratorios = Laboratorios::all();
        $usuarios = Usuarios::all();
        $campus = Campus::all();
        $router->render("administrador/adminxcampus", [
            "laboratorios" => $laboratorios,
            "usuarios" => $usuarios,
            "campus" => $campus
        ]);
    }
    public static function reservacion(Router $router) {
        $laboratorios = Laboratorios::all();
        $router->render("reservacion/reservacion", [
            "laboratorios" => $laboratorios
        ]);
    }
    public static function encargados(Router $router) {
        session_start();
        $username = $_SESSION["login_user"] ?? null;
        $usuario = Usuarios::where("nom_usuario", $username);
        $laboratorio = laboratorios::where("id_encargado", $usuario[0]->id_lab);
        $campus = Campus::find($usuario[0]->id_campus);
        $router->render("encargados/encargados", [
            "usuario" => $usuario[0],
            "laboratorio" => $laboratorio[0],
            "campus" => $campus
        ]);
    }
}
?>