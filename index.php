<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/login.css">

    
</head>
<body>
    <div class="login">
        <h2>Inicia Sesion</h2>
        <form action="/views/validar_login.php" method="POST">
        <div class="formulario">
                <label class="formulario__label" for="username">Usuario:</label>
                <input class="formulario__input" type="text" id="username" name="username" required autofocus>
            </div>
            <div class="formulario">
                <label class="formulario__label" for="password">Contraseña:</label>
                <input class="formulario__input" type="password" id="password" name="password" required>
            </div>
            <div class="formulario">
                <input class="boton" type="submit" value="Iniciar sesión">
            </div>
            <div class="formulario">
                <a class="enlace" href="views/registrar.php">¿No tienes cuenta? Registrate</a>
            </div>
        </form>
        

        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error === 'invalid_credentials') {
                echo '<p class="error-message">Usuario o contraseña incorrectos. Inténtelo de nuevo.</p>';
            } elseif ($error === 'empty_fields') {
                echo '<p class="error-message">Por favor, complete todos los campos.</p>';
            }
        }
        ?>


    </div>
</body>
</html>
