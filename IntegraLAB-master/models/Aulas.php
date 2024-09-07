<?php 

namespace Model;

class Aulas extends ActiveRecord {
    protected static $tabla = "aulas";
    protected static $columnasDB = ["id", "nom_aula", "capacidad_aula", "id_lab"];

    public $id = null;
    public $nom_aula;
    public $capacidad_aula;
    public $id_lab;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nom_aula = $args["nom_aula"] ?? "";
        $this->capacidad_aula = $args["capacidad_aula"] ?? 0;
        $this->id_lab = $args["id_lab"] ?? 0;
    }
}

?>