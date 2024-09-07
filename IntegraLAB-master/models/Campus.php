<?php 

namespace Model;

class Campus extends ActiveRecord {
    protected static $tabla = "campus";
    protected static $columnasDB = ["id", "nom_campus", "estado_campus"];

    public $id = null;
    public $nom_campus;
    public $estado_campus;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nom_campus = $args["nom_campus"] ?? "";
        $this->estado_campus = $args["capacidad_aula"] ?? 0;
    }
}
?>