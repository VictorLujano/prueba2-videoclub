<?php
require_once '../conexion.php';


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$precio_renta = $_POST['precio_renta'];
$dias_renta = $_POST['dias_renta'];
$disponible = $_POST['disponible'];


if ($conn) {

    $sql = "UPDATE multimedia SET titulo = '$titulo', tipo = '$tipo', precio_renta = '$precio_renta', dias_renta = '$dias_renta', disponible = '$disponible' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_principal.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Error al conectar a la base de datos.";
}
?>
