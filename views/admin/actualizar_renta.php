<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar</title>
    <link rel="stylesheet" href="../../css/actualizar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Actualizar Datos de la renta</h1>

    <?php

    require_once '../conexion.php';



    if ($conn) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM rentas WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {

            $row = mysqli_fetch_assoc($resultado);
            $usuarioID = $row['usuarioID'];
            $contenidoID = $row['contenidoID'];
            $fechaRenta = $row['fechaRenta'];
            $fechaDevolucion = $row['fechaDevolucion'];
            $costoTotal = $row['costoTotal'];
            $diasRetraso = $row['diasRetraso'];
            $costoExtraRetraso = $row['costoExtraRetraso'];
    
            mysqli_free_result($resultado);
            mysqli_close($conn);
        }else {
            echo "Error al obtener los datos del registro: " . mysqli_error($conn);
        }
    } else {
        echo "Error al conectar a la base de datos.";
        exit();
    }
    ?>

    <div class="contenedor">
    <form method="POST" action="actualizar_registroRenta.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="campo">
        <label class="contenedor__texto" for="usuarioID">usuarioID:</label>
        <input class="contenedor__input" type="text" id="usuarioID" name="usuarioID" value="<?php echo $usuarioID; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="contenidoID">contenidoID:</label>
        <input class="contenedor__input" type="text" id="contenidoID" name="contenidoID" value="<?php echo $contenidoID; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="fechaRenta">fecha de renta:</label>
        <input class="contenedor__input" type="text" id="fechaRenta" name="fechaRenta" value="<?php echo $fechaRenta; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="fechaDevolucion">fecha de devolucion:</label>
        <input class="contenedor__input" type="text" id="fechaDevolucion" name="fechaDevolucion" value="<?php echo $fechaDevolucion; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="costoTotal">costoTotal:</label>
        <input class="contenedor__input" type="text" id="costoTotal" name="costoTotal" value="<?php echo $costoTotal; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="diasRetraso">diasRetraso:</label>
        <input class="contenedor__input" type="text" id="diasRetraso" name="diasRetraso" value="<?php echo $diasRetraso; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="costoExtraRetraso">costoExtraRetraso:</label>
        <input class="contenedor__input" type="text" id="costoExtraRetraso" name="costoExtraRetraso" value="<?php echo $costoExtraRetraso; ?>" required>
        </div>
        
        <input class="contenedor__boton" type="submit" value="Actualizar Registro">
    </form>
    </div>

    <button class="regresar" onclick="window.location.href='rentas.php'">Regresar</button>

</body>
</html>
