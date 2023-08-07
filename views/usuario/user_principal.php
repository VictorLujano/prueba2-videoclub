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
        <a href="user_principal.php" class="navegacion__enlace navegacion__enlace--activo">Inicio</a>
        <a href="catalogo.php" class="navegacion__enlace">Catalogo</a>
        <a href="rentas.php" class="navegacion__enlace">Mis rentas</a>
    </nav>

    <main>
        <h1>Inicio</h1>

        <section class="featured-content">
            <h2>Contenido Destacado</h2>
            <div class="content-item">
                <img src="../../img/Iron_Man_1_Portada.webp" alt="Pelicula 1">
                <h3>IRON MAN</h3>
                <p>Un empresario millonario construye un traje blindado y lo usa para combatir el crimen y el terrorismo.</p>
                <a href="detalle.php?id=1">Ver Detalles</a>
            </div>
            <div class="content-item">
                <img src="../../img/i-am-mother.webp" alt="Pelicula 2">
                <h3>I AM MOTHER</h3>
                <p>La humanidad está al borde de la extinción, pero un robot cría a una niña.</p>
                <a href="detalle.php?id=2">Ver Detalles</a>
            </div>
        </section>
    </main>

    <button onclick="location.href='../cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>