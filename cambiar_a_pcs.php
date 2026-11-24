<?php
include "config.php";
$conn->query("ALTER TABLE equipos ADD COLUMN IF NOT EXISTS ubicacion VARCHAR(100)");
$conn->query("DELETE FROM equipos");
for($i=1; $i<=12; $i++){
  $num = str_pad($i, 2, '0', STR_PAD_LEFT);
  $codigo = "PC-$num-LAB1";
  $ubi = "Laboratorio 1 - Mesa $i";
  $conn->query("INSERT INTO equipos (numero_inventario, nombre, tipo, marca, modelo, ubicacion, estado) VALUES ('$codigo','PC','Cómputo','HP','ProDesk','$ubi','Disponible')");
  echo "OK $codigo<br>";
}
echo "<b>LISTO</b>";
?>