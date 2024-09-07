<?php 

namespace Model;

class Laboratorios extends ActiveRecord {
    protected static $tabla = "laboratorio";
    protected static $columnasDB = ["id", "nom_lab", "id_campus", "descripcion_laboratorio", "id_encargado", "imagen_lab"];

    public $id = null;
    public $nom_lab;
    public $id_campus;
    public $descripcion_laboratorio;
    public $id_encargado;
    public $imagen_lab;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nom_lab = $args["nom_lab"] ?? "";
        $this->id_campus = $args["id_campus"] ?? 0;
        $this->descripcion_laboratorio = $args["descripcion_laboratorio"] ?? "";
        $this->id_encargado = $args["id_encargado"] ?? null;
        $this->imagen_lab = $args["imagen_lab"] ?? null;
    }
}

?>