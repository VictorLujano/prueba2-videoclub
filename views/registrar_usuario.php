<?php
require_once 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$password = md5($_POST['password']);

if ($conn) {

    $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, password, admin) VALUES ('$nombre', '$apellido', '$usuario', '$correo', '$password', '0')";

    $resultado = mysqli_query($conn, $sql);

    mysqli_close($conn);

    if ($resultado) {
        header("Location: ../index.php");
        exit();
    
    } else {
        echo "Error al insertar en la base de datos.";
    }
} else {
    echo "Error al conectar a la base de datos.";
}
?>
