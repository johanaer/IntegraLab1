<?php 

namespace Controllers;

use Model\Materiales;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Solicitud;

class MaterialesController {
    public static function index(Router $router) {
        $materiales = Materiales::all();
        imprimir($materiales);
    }

    public static function getMaterial() {
        $id = $_GET["id"];
        $material = Materiales::find($id);
        echo json_encode($material);
    }
    
    public static function getMateriales() {
        $id = $_GET["id"];
        $materiales = Materiales::where("id_lab", $id, null);
        echo json_encode($materiales);
    }

    public static function agregarMaterial() {
        $material = new Materiales($_POST);
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        if($_FILES["imagen"]["tmp_name"]) {
            $image = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,600);
            $material->setImagen($nombreImagen);
        }
        if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        $resultado = $material->crear();
        if($resultado["resultado"]) {
            echo json_encode($resultado);
        }
    }

    public static function actualizarMaterial() {
        $materialActual = Materiales::find($_POST["id"]);
        $materialActual->sincronizar($_POST);
        if($_FILES) {
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            $materialActual->eliminarImagen();
            if($_FILES["imagen"]["tmp_name"]) {
                $image = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,600);
                $materialActual->setImagen($nombreImagen);
            }
            if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
            }
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        $resultado = $materialActual->actualizar($_POST["id"]);
        if($resultado["resultado"]) {
            echo json_encode($resultado);
        }
        else {
            echo json_encode("Error al actualizar el material");
        }
    }

    public static function eliminarMaterial() {
        $id = $_POST["id_material"];
        $material = Materiales::find($id);
        $solicitud = Solicitud::where("id_material", $material->id);
        $errores = [];
        if(!empty($solicitud)) {
            $errores["code"] = 500;
            $errores["message"] = "Hay solicitudes con este material";
            echo json_encode($errores);
        } else {
            $material->eliminarImagen();
            $resultado = $material->eliminar($id);
            if($resultado) {
                echo json_encode($resultado);
            }
        }
    }
}

?>