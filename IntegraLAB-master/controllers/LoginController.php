<?php

namespace Controllers;

use Model\Usuarios;

class LoginController {
    public static function realizarLogin() {
        $username = $_POST["nom_usuario"];
        $usuario = Usuarios::where("nom_usuario", $username);
        $errores = [];
        if(empty($usuario)) {
            $errores["code"] = 500;
            $errores["message"] = "Usuario no existe";
            echo json_encode($errores);
        } else if($usuario[0]->pass_usuario !== $_POST["pass_usuario"]) {
            $errores["code"] = 500;
            $errores["message"] = "Contraseña incorrecta";
            echo json_encode($errores);
        } else {
            session_start();
            $_SESSION["id_usuario"] = $usuario[0]->id;
            $errores["code"] = 200;
            $errores["id_tipoUsu"] = $usuario[0]->id_tipoUsu;
            echo json_encode($errores);
        }
    }

}

?>