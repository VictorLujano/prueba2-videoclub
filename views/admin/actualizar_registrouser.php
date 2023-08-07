<?php
require_once '../conexion.php';


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$admin = $_POST['admin'];


if ($conn) {

    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', usuario = '$usuario', correo = '$correo', password = '$password', admin = '$admin' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Error al conectar a la base de datos.";
}
?>
