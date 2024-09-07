<?php 

namespace Model;

class Usuarios extends ActiveRecord {
    protected static $tabla = "usuario";
    protected static $columnasDB = ["id", "nom_usuario", "pass_usuario", "correo_usuario", "id_tipoUsu", "id_campus", "id_lab"];

    public $id = null;
    public $nom_usuario;
    public $pass_usuario;
    public $correo_usuario;
    public $id_tipoUsu;
    public $id_campus;
    public $id_lab;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nom_usuario = $args["nom_usuario"] ?? "";
        $this->pass_usuario = $args["pass_usuario"] ?? "";
        $this->correo_usuario = $args["correo_usuario"] ?? "";
        $this->id_tipoUsu = $args["id_tipoUsu"] ?? 0;
        $this->id_campus = $args["id_campus"] ?? 0;
        $this->id_lab = $args["id_lab"] ?? 0;
    }

    public function setTipoUsuario($tipo) {
        $this->id_tipoUsu = $tipo;
    }

    public function setIdCampus($campus) {
        $this->id_campus = $campus;
    }
    public function setIdLab($lab) {
        $this->id_lab = $lab;
    }
}

?>