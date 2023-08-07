<html>
<head>
    <title>Registrar</title>
    <link rel="stylesheet" href="../css/registro.css">

    
</head>
<body>
    <div class="login">
        <h2>Registrar</h2>
        <form action="registrar_usuario.php" method="POST">
        <div class="formulario">
                <label class="formulario__label" for="nombre">Nombre:</label>
                <input class="formulario__input" type="text" id="nombre" name="nombre" required autofocus>
            </div>
            <div class="formulario">
                <label class="formulario__label" for="apellido">Apellido:</label>
                <input class="formulario__input" type="text" id="apellido" name="apellido" required>
            </div>

            <div class="formulario">
                <label class="formulario__label" for="usuario">Usuario:</label>
                <input class="formulario__input" type="text" id="usuario" name="usuario" required>
            </div>

            <div class="formulario">
                <label class="formulario__label" for="correo">Correo:</label>
                <input class="formulario__input" type="email" id="correo" name="correo" required>
            </div>

            <div class="formulario">
                <label class="formulario__label" for="password">Contraseña:</label>
                <input class="formulario__input" type="password" id="password" name="password" required>
            </div>

            <div class="formulario">
                <input class="boton" type="submit" value="Registrar">
            </div>
            <div class="formulario">
                <a class="enlace" href="../index.php">¿Ya tienes cuenta? Inicia sesion</a>
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
