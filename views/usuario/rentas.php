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
        <a href="catalogo.php" class="navegacion__enlace">Catalogo</a>
        <a href="rentas.php" class="navegacion__enlace navegacion__enlace--activo">Mis rentas</a>
    </nav>

    <main>
        <h1>Mis rentas</h1>
    </main>

    <button onclick="location.href='../cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>