<?php
$host = "localhost";
$baseDatos = "control_lab";
$usuario = "controllab";
$contrasena = "lab2026!";

try {
   $pdo = new PDO(
      "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4",
      $usuario,
      $contrasena,
      [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
   );
} catch (PDOException $error) {
   echo "Error de conexion:" . $error->getMessage();
   die("No fue posible realizar la conexion a la base de datos");
}
?>