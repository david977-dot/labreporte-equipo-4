<?php include "config.php"; ?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Disponibilidad</title>
<style>
*{box-sizing:border-box} body{margin:0; font-family:Arial; background:#f2f4f7; display:flex}
.sidebar{width:230px; background:#1e3a5f; color:white; min-height:100vh; padding:20px 0}
.sidebar h2{padding:0 20px}
.sidebar a{color:white; display:block; padding:12px 20px; text-decoration:none}
.sidebar a.activo, .sidebar a:hover{background:#2a5a8a}
.main{flex:1; padding:25px 30px}
.top{display:flex; justify-content:space-between; align-items:center}
.btn-azul{background:#2563eb; color:white; border:0; padding:10px 18px; border-radius:8px; cursor:pointer; text-decoration:none}
.buscador{margin:20px 0; background:white; padding:12px; border-radius:8px; display:flex; gap:10px}
.buscador input{flex:1; padding:10px; border:1px solid #ddd; border-radius:6px}
table{width:100%; background:white; border-collapse:collapse; border-radius:8px; overflow:hidden}
th,td{padding:14px; text-align:left; border-bottom:1px solid #eee}
</style></head><body>

<div class="sidebar">
<h2>LabReport</h2>
<a href="index.php">Panel</a>
<a href="equipos.php">Equipos</a>
<a href="disponibilidad.php" class="activo">Disponibilidad</a>
<a href="prestamos.php">Préstamos</a>
<a href="#">Reportes</a>
<a href="#">Configuración</a>
<a href="#">Cerrar sesión</a>
</div>

<div class="main">
<div class="top">
<h1>Disponibilidad</h1>
<a class="btn-azul" href="prestamos.php">+ Registrar préstamo</a>
</div>

<div class="buscador">
<input placeholder="Buscar equipo...">
<button class="btn-azul">Buscar</button>
</div>

<table>
<tr><th>Codigo de Equipo</th><th>Ubicacion</th><th>Estado</th><th>Acciones</th></tr>
<?php
$r = $conn->query("SELECT * FROM equipos WHERE estado='Disponible' ORDER BY numero_inventario");
while($e = $r->fetch_assoc()){
  echo "<tr><td>".$e['numero_inventario']."</td><td>".$e['ubicacion']."</td><td>".$e['estado']."</td><td></td></tr>";
}
?>
</table>
</div>

</body></html>