<?php

use Controllers\CalendarioController;

require_once('controllers/CalendarioController.php');

$controller = new CalendarioController();
$controller->obtenerReservacion();
?>