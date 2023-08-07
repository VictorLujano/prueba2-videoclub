<?php

require_once '../conexion.php';

$id = $_GET['id'];

if ($conn) {

    $sql = "DELETE FROM rentas WHERE id = '$id'";

    $resultado = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if ($resultado) {
        header("Location: rentas.php");
        exit();
    
    } else {
        echo "Error al eliminar en la base de datos.";
    }

} else {
    echo "Error al conectar a la base de datos.";
}
?>
