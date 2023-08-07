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
    <h1>Actualizar Datos del contenido</h1>

    <?php

    require_once '../conexion.php';



    if ($conn) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM multimedia WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {

            $row = mysqli_fetch_assoc($resultado);
            $titulo = $row['titulo'];
            $tipo = $row['tipo'];
            $precio_renta = $row['precio_renta'];
            $dias_renta = $row['dias_renta'];
            $disponible = $row['disponible'];
    
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
    <form method="POST" action="actualizar_registro.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="campo">
        <label class="contenedor__texto" for="titulo">Titulo:</label>
        <input class="contenedor__input" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="tipo">Tipo:</label>
        <input class="contenedor__input" type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="precio_renta">Precio de renta:</label>
        <input class="contenedor__input" type="text" id="precio_renta" name="precio_renta" value="<?php echo $precio_renta; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="dias_renta">Dias maximos de renta:</label>
        <input class="contenedor__input" type="text" id="dias_renta" name="dias_renta" value="<?php echo $dias_renta; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="disponible">Disponible:</label>
        <input class="contenedor__input" type="text" id="disponible" name="disponible" value="<?php echo $disponible; ?>" required>
        </div>
        
        <input class="contenedor__boton" type="submit" value="Actualizar Registro">
    </form>
    </div>

    <button class="regresar" onclick="window.location.href='admin_principal.php'">Regresar</button>

</body>
</html>
