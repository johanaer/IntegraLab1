<?php

require __DIR__ . "/../vendor/autoload.php";
require "funciones.php";
require "config/database.php";

use Model\ActiveRecord;

ActiveRecord::setDB(conectarDB());
?>