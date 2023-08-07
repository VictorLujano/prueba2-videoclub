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
    <h1>Actualizar Datos del usuario</h1>

    <?php

    require_once '../conexion.php';



    if ($conn) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {

            $row = mysqli_fetch_assoc($resultado);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $usuario = $row['usuario'];
            $correo = $row['correo'];
            $password = $row['password'];
            $admin = $row['admin'];
    
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
    <form method="POST" action="actualizar_registrouser.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="campo">
        <label class="contenedor__texto" for="nombre">Nombre:</label>
        <input class="contenedor__input" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="apellido">Apellido:</label>
        <input class="contenedor__input" type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="usuario">Usuario:</label>
        <input class="contenedor__input" type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="correo">Correo:</label>
        <input class="contenedor__input" type="text" id="correo" name="correo" value="<?php echo $correo; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="password">Password:</label>
        <input class="contenedor__input" type="text" id="password" name="password" value="<?php echo $password; ?>" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="admin">Admin:</label>
        <input class="contenedor__input" type="text" id="admin" name="admin" value="<?php echo $admin; ?>" required>
        </div>
        
        <input class="contenedor__boton" type="submit" value="Actualizar Registro">
    </form>
    </div>

    <button class="regresar" onclick="window.location.href='usuarios.php'">Regresar</button>

</body>
</html>
