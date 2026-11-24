<?php
// Configuración de conexión a MySQL (XAMPP por defecto).
$host = "localhost";
$db   = "sistema_prestamo";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die("No se pudo conectar con MySQL. Revisa config.php y crea la base de datos. Detalle: " . htmlspecialchars($e->getMessage()));
}
$conexion = new PDO(...);
$pdo = $conexion;
