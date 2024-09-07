<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integralab";

// Crea la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
else{
    //echo "conexión exitosa";
}

//  O3nks3n*
session_start();
if(isset($_POST['submit'])){
    // Obtener los datos del usuario enviados desde el formulario de inicio de sesión
    $username = $_POST['usuario'];
    $password = $_POST['clave'];

    $sql = "SELECT id_tipoUsu FROM usuario WHERE nom_usuario='$username' AND pass_usuario='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0) {
        //echo "si hay usuarios en las tablas";
        $tipoUsuario = $result->fetch_assoc();
        if($tipoUsuario['id_tipoUsu'] == 1){
            //echo "El usuario es adminxcampus";
            $_SESSION['login_user'] = $username;
            header("location: http://localhost:1000/adminxcampus");
        }
        else if($tipoUsuario['id_tipoUsu'] == 2){
            //echo "El usuario es encargado";
            $_SESSION['login_user'] = $username;
            header("location: http://localhost:1000/encargados");
        }
        else if($tipoUsuario['id_tipoUsu'] == 3){
            echo "El usuario es profesor";
            $_SESSION['login_user'] = $username;
            header("location: http://localhost:1000/dashboard");
        }else{
            echo "Usuario no valido";
        }
    }else{
        echo "No hay registro de usuarios en las tablas";
    }
}

mysqli_close($conn);

?>