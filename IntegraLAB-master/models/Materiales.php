<?php 

namespace Model;

use Error;
use Exception;

class Materiales extends ActiveRecord {
    protected static $tabla = "materiales";
    protected static $columnasDB = ["id", "nom_material", "existencia_material", "id_lab", "imagen_material"];

    public $id = null;
    public $nom_material;
    public $existencia_material;
    public $id_lab;
    public $imagen_material;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nom_material = $args["nom_material"] ?? "";
        $this->existencia_material = $args["existencia_material"] ?? 0;
        $this->id_lab = $args["id_lab"] ?? "";
        $this->imagen_material = $args["imagen_material"] ?? "";
    }

    public function setImagen($imagen) {
        $this->imagen_material = trim($imagen);
    }

    public function eliminarImagen() {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen_material);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen_material);
        }
    }
}

?>