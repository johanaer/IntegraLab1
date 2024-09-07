<?php 

namespace Model;

class Solicitud extends ActiveRecord {
    protected static $tabla = "solicitud_material";
    protected static $columnasDB = ["id", "id_reser", "id_material", "cantidad_material"];

    public $id = null;
    public $id_reser;
    public $id_material;
    public $cantidad_material;


    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->id_reser = $args["id_reser"] ?? "";
        $this->id_material = $args["id_material"] ?? "";
        $this->cantidad_material = $args["cantidad_material"] ?? "";

    }
}

?>