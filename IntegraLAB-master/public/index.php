<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\SolicitudController;
use MVC\Router;
use Controllers\AppViewsController;
use Controllers\AulaController;
use Controllers\LaboratoriosController;
use Controllers\LoginController;
use Controllers\MaterialesController;
use Controllers\ReservacionController;
use Controllers\UsuariosController;

$router = new Router();
$router->get("/", [AppViewsController::class, "index"]);
$router->get("/login", [AppViewsController::class, "login"]);
$router->get("/recuperar_password", [AppViewsController::class, "olvide_contraseña"]);
$router->get("/logout", [AppViewsController::class, "logout"]);
$router->get("/reestabler", [AppViewsController::class, "recuperarContraseña"]);
$router->get("/calendario", [AppViewsController::class, "calendario"]);
$router->get("/laboratorio", [AppViewsController::class, "laboratorio"]);
$router->get("/laboratorio/material", [AppViewsController::class, "materiales"]);
$router->get("/actividades", [AppViewsController::class, "actividades"]);
$router->get("/historial", [AppViewsController::class, "historial"]);
$router->get("/reporte", [AppViewsController::class, "reporte"]);
$router->get("/adminxcampus", [AppViewsController::class, "administrador"]);
$router->get("/reservacion", [AppViewsController::class, "reservacion"]);
$router->get("/dashboard", [AppViewsController::class, "dashboard"]);
$router->get("/encargados", [AppViewsController::class, "encargados"]);

$router->get("/laboratorio/index", [LaboratoriosController::class, "index"]);
$router->get("/laboratorio/ver", [LaboratoriosController::class, "verLaboratorio"]);
$router->get("/laboratorio/obtener/encargado", [LaboratoriosController::class, "obtenerLaboratoriosConEncargados"]);
$router->get("/laboratorio/encargado/ver", [UsuariosController::class, "getUsuario"]);
$router->get("/laboratorio/materiales", [MaterialesController::class, "getMateriales"]);
$router->get("/laboratorio/material", [MaterialesController::class, "getMaterial"]);
$router->post("/laboratorio/material/crear", [MaterialesController::class, "agregarMaterial"]);
$router->post("/laboratorio/material/actualizar", [MaterialesController::class, "actualizarMaterial"]);
$router->post("/laboratorio/material/eliminar", [MaterialesController::class, "eliminarMaterial"]);
$router->post("/laboratorio/encargado", [LaboratoriosController::class, "agregarEncargado"]);
$router->post("/laboratorio/editar", [LaboratoriosController::class, "editarLaboratorio"]);
$router->post("/laboratorio/guardar", [LaboratoriosController::class, "agregarLaboratorio"]);
$router->post("/laboratorio/eliminar", [LaboratoriosController::class, "eliminarLaboratorio"]);

$router->get("/laboratorio/aulas", [AulaController::class, "obtenerAulasLaboratorio"]);
$router->get("/laboratorio/aula", [AulaController::class, "getAula"]);
$router->post("/laboratorio/aulas/guardar", [AulaController::class, "guardarAula"]);
$router->post("/laboratorio/aulas/actualizar", [AulaController::class, "actualizarAula"]);
$router->post("/laboratorio/aula/eliminar", [AulaController::class, "eliminarAula"]);

$router->get("/usuarios/todos", [UsuariosController::class, "index"]);
$router->get("/usuarios", [UsuariosController::class, "getUsuario"]);
$router->get("/laboratorio/usuarios", [UsuariosController::class, "getUsuariosLaboratorios"]);
$router->post("/usuario/agregar", [UsuariosController::class, "agregarUsuario"]);
$router->post("/usuario/actualizar", [UsuariosController::class, "actualizarUsuario"]);

$router->get("/reservacion/obtener/fecha", [ReservacionController::class, "obtenerReservacionesFecha"]);
$router->post("/reservacion/guardar", [ReservacionController::class, "guardarReservacion"]);

$router->post("/solicitud/material", [SolicitudController::class, "guardar"]);

// $router->post("/login", [LoginController::class, "realizarLogin"]);
$router->post("/logeo", [AppViewsController::class, "logue"]);

$router->comprobarRutas();