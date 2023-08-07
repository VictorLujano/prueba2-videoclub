<?php

require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["admin"] == 1) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: admin/admin_principal.php");
            exit;

        } else {

            session_start();
            $_SESSION['username'] = $username;
            header("Location: usuario/user_principal.php");
            exit;
        }
    } else {
        echo "Credenciales inválidas";
    }

    $stmt->close();
    $conn->close();
}
?>