<?php
require_once '../conexion.php';


$id = $_POST['id'];
$usuarioID = $_POST['usuarioID'];
$contenidoID = $_POST['contenidoID'];
$fechaRenta = $_POST['fechaRenta'];
$fechaDevolucion = $_POST['fechaDevolucion'];
$costoTotal = $_POST['costoTotal'];
$diasRetraso = $_POST['diasRetraso'];
$costoExtraRetraso = $_POST['costoExtraRetraso'];


if ($conn) {

    $sql = "UPDATE rentas SET usuarioID = '$usuarioID', contenidoID = '$contenidoID', fechaRenta = '$fechaRenta', fechaDevolucion = '$fechaDevolucion', costoTotal = '$costoTotal', diasRetraso = '$diasRetraso', costoExtraRetraso = '$costoExtraRetraso' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: rentas.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Error al conectar a la base de datos.";
}
?>
