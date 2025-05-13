<?php
function obtenerConexion() {
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $basededatos = 'Registros';

    $conn = new mysqli($host, $usuario, $contrasena, $basededatos);

    if ($conn->connect_error) {
        die("ERROR de conexión: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4"); 

    return $conn;
}
?>