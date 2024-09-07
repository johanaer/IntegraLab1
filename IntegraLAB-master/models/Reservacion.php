<?php 

namespace Model;

class Reservacion extends ActiveRecord {
    protected static $tabla = "reservacion_lugar";
    protected static $columnasDB = ["id", "fecha_reser", "hrinicio_reser", "hrtermino_reser", "id_usuario", "id_lab", "id_aula", "tipo_reservacion"];

    public $id = null;
    public $fecha_reser;
    public $hrinicio_reser;
    public $hrtermino_reser;
    public $id_usuario;
    public $id_lab;
    public $id_aula;
    public $tipo_reservacion;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->fecha_reser = $args["fecha_reser"] ?? "";
        $this->hrinicio_reser = $args["hrinicio_reser"] ?? "";
        $this->hrtermino_reser = $args["hrtermino_reser"] ?? "";
        $this->id_usuario = $args["id_usuario"] ?? null;
        $this->id_lab = $args["id_lab"] ?? null;
        $this->id_aula = $args["id_aula"] ?? null;
        $this->tipo_reservacion = $args["tipo_reservacion"] ?? "";
    }
}

?>