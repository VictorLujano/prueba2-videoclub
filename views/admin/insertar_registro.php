<?php
require_once '../conexion.php';


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$precio_renta = $_POST['precio_renta'];
$dias_renta = $_POST['dias_renta'];
$disponible = $_POST['disponible'];


if ($conn) {

    $sql = "INSERT INTO multimedia (id, titulo, tipo, precio_renta, dias_renta, disponible) VALUES ('$id', '$titulo', '$tipo', '$precio_renta', '$dias_renta', '$disponible')";

    $resultado = mysqli_query($conn, $sql);

    mysqli_close($conn);

    if ($resultado) {
        header("Location: admin_principal.php");
        exit();
    
    } else {
        echo "Error al insertar en la base de datos.";
    }
} else {
    echo "Error al conectar a la base de datos.";
}
?>
