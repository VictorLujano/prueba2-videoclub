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
        <a href="admin_principal.php" class="navegacion__enlace">Inicio</a>
        <a href="productos.php" class="navegacion__enlace">Agregar contenido multimedia</a>
        <a href="usuarios.php" class="navegacion__enlace">Usuarios</a>
        <a href="rentas.php" class="navegacion__enlace navegacion__enlace--activo">Rentas</a>
    </nav>

    <main>
        <h1>Rentas</h1>

        
    <table>
        <tr>
            <th>id</th>
            <th>usuarioID</th>
            <th>contenidoID</th>
            <th>fechaRenta</th>
            <th>fechaDevolucion</th>
            <th>costoTotal</th>
            <th>diasRetraso</th>
            <th>costoExtraRetraso</th>
            <th></th>
            <th></th>
        </tr>

        <?php 
        
        require_once '../conexion.php';

        if($conn) {
            $sql = "SELECT id, usuarioID, contenidoID, fechaRenta, fechaDevolucion, costoTotal, diasRetraso, costoExtraRetraso FROM rentas";
            $resultado = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['usuarioID'] . "</td>";
                echo "<td>" . $row['contenidoID'] . "</td>";
                echo "<td>" . $row['fechaRenta'] . "</td>";
                echo "<td>" . $row['fechaDevolucion'] . "</td>";
                echo "<td>" . $row['costoTotal'] . "</td>";
                echo "<td>" . $row['diasRetraso'] . "</td>";
                echo "<td>" . $row['costoExtraRetraso'] . "</td>";
                echo "<td><button onclick=\"location.href='actualizar_renta.php?id=".$row['id']."'\" class=\"boton boton-actualizar\">Actualizar</button></td>";
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
                location.href = "eliminar_renta.php?id=" + id;
            }
        }
    </script>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>