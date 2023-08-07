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
    <link rel="stylesheet" href="../../css/usuario.css">
</head>
<body>
    <header class="header">
        <a href="user_principal.php">
            <img class="header__logo" src="../../img/logo.png" alt="logo">
        </a>
    </header>

    <nav class="navegacion">
        <a href="user_principal.php" class="navegacion__enlace">Inicio</a>
        <a href="catalogo.php" class="navegacion__enlace navegacion__enlace--activo">Catalogo</a>
        <a href="rentas.php" class="navegacion__enlace">Mis rentas</a>
    </nav>

    <main>
        <h1>Catalogo</h1>

        <?php
        require_once '../conexion.php';

        ?>

        <h2>Catálogo de Contenido Multimedia</h2>
        <div class="catalogo">
        <div class="lista-catalogo">
            
            <?php
            $sql = "SELECT * FROM multimedia";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='contenido-catalogo'>";
                    echo "<h3>" . $row["titulo"] . "</h3>";
                    echo "<p><strong>Tipo:</strong> " . $row["tipo"] . "</p>";
                    echo "<p><strong>Precio:</strong> $" . $row["precio_renta"] . "</p>";
                    echo "<p><strong>Tiempo de entrega:</strong> " . $row["dias_renta"] . " días</p>";
                    echo "<p><strong>Tiempo de entrega:</strong> " . $row["disponible"] . " </p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontró contenido multimedia en el catálogo.</p>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>
    </div>

    </main>

    <button onclick="location.href='../cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>