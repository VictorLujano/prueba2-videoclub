<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "videocentro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
