<?php

function conectarDB() : mysqli {
    $db = new mysqli("localhost", "root", "", "integralab");
    if(!$db) {  
        echo "Error al conectar";
        exit;
    }
    return $db;
}
?>
