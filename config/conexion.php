<?php

$host = "localhost";
$baseDatos = "sistema_prestamo";
$usuario = "controllab";
$contrasena = "lab2026!";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4",
        $usuario, $contrasena,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
            ] );

} catch (PDOException $error) {
    die("No fue posible conectar con la base de datos.");

}

?>