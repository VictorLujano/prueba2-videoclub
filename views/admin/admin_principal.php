<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Prueba</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <header class="header">
        <a href="admin_principal.php">
            <img class="header__logo" src="../../img/logo.png" alt="logo">
        </a>
    </header>

    <nav class="navegacion">
        <a href="admin_principal.php" class="navegacion__enlace navegacion__enlace--activo">Inicio</a>
        <a href="productos.php" class="navegacion__enlace">Agregar contenido multimedia</a>
        <a href="usuarios.php" class="navegacion__enlace">Usuarios</a>
        <a href="rentas.php" class="navegacion__enlace">Rentas</a>
    </nav>

    <main>
        <h1>Inicio</h1>
        
    <table>
        <tr>
            <th>id</th>
            <th>titulo</th>
            <th>tipo</th>
            <th>precio de renta</th>
            <th>dias maximos de renta</th>
            <th>disponible</th>
            <th></th>
            <th></th>
        </tr>

        <?php 
        
        require_once '../conexion.php';

        if($conn) {
            $sql = "SELECT id, titulo, tipo, precio_renta, dias_renta, disponible FROM multimedia";
            $resultado = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['tipo'] . "</td>";
                echo "<td>" . $row['precio_renta'] . "</td>";
                echo "<td>" . $row['dias_renta'] . "</td>";
                echo "<td>" . $row['disponible'] . "</td>";
                echo "<td><button onclick=\"location.href='actualizar.php?id=".$row['id']."'\" class=\"boton boton-actualizar\">Actualizar</button></td>";
                echo "<td><button onclick=\"eliminarRegistro('".$row['id']."')\" class=\"boton boton-eliminar\">Eliminar</button></td>";
                echo "</tr>";
            }

            mysqli_free_result($resultado);
            mysqli_close($conn);
        } else {
            echo "Error al conectar a la base de datos.";
        }
        ?>

    </table>

    </main>

    <button onclick="location.href='../cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <script>
        function eliminarRegistro(id) {
            if (confirm("¿Deseas eliminar este registro?")) {
                location.href = "eliminar_registro.php?id=" + id;
            }
        }
    </script>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>