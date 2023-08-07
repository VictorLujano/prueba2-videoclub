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
        <a href="productos.php" class="navegacion__enlace navegacion__enlace--activo">Agregar contenido multimedia</a>
        <a href="usuarios.php" class="navegacion__enlace">Usuarios</a>
        <a href="rentas.php" class="navegacion__enlace">Rentas</a>
    </nav>

    <main>
        <h1>Agregar</h1>

        <div class="contenedor">
    <form method="POST" action="insertar_registro.php">
        <div class="campo">
        <label class="contenedor__texto" for="id">Codigo del contenido: </label>
        <input class="contenedor__input" type="text" id="id" name="id" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="titulo">Titulo:</label>
        <input class="contenedor__input" type="text" id="titulo" name="titulo" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="tipo">Tipo:</label>
        <select class="contenedor__input" id="tipo" name="tipo" required>
            <option value="" disabled selected>--- Selecciona una opción ---</option>
            <option value="CD">CD</option>
            <option value="DVD">DVD</option>
            <option value="Blu-Ray">Blu-Ray</option>
            <option value="Blu-Ray">Video Juego</option>
        </select>
        </div>


        <div class="campo">
        <label class="contenedor__texto" for="precio_renta">Precio de renta:</label>
        <input class="contenedor__input" type="text" id="precio_renta" name="precio_renta" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="dias_renta">Dias de renta:</label>
        <input class="contenedor__input" type="text" id="dias_renta" name="dias_renta" required>
        </div>

        <div class="campo">
        <label class="contenedor__texto" for="disponible">Disponible:</label>
        <input class="contenedor__input" type="text" id="disponible" name="disponible" required>
        </div>

        <input class="contenedor__boton" type="submit" value="Insertar Registro">
    </form>
    </div>

    </main>

    <button onclick="location.href='../cerrar_sesion.php'" class="boton">Cerrar Sesión</button>

    <footer class="footer">
        <p class="footer__texto">Pagina de renta</p>
    </footer>
</body>
</html>