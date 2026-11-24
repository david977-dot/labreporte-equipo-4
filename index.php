<?php include "config.php"; 
$total = $conn->query("SELECT COUNT(*) c FROM equipos")->fetch_assoc()['c'];
$disp = $conn->query("SELECT COUNT(*) c FROM equipos WHERE estado='Disponible'")->fetch_assoc()['c'];
$pres = $conn->query("SELECT COUNT(*) c FROM equipos WHERE estado='Prestado'")->fetch_assoc()['c'];
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Sistema de préstamo</title>
<style>
body{font-family:Arial; background:#f2f4f7; margin:0}
.header{background:#1e3a5f; color:white; padding:20px 25px}
.header h1{margin:0; font-size:24px}
.header p{margin:5px 0 0 0; color:#a8c0d8}
.main{padding:25px}
.resumen{display:flex; gap:15px; margin-bottom:20px}
.caja-resumen{background:white; flex:1; padding:20px; border-radius:10px; text-align:center}
.caja-resumen b{font-size:28px; color:#1e3a5f; display:block}
.grid{display:grid; grid-template-columns:1fr 1fr 1fr; gap:15px}
.card{background:white; padding:20px; border-radius:10px; text-decoration:none; color:#111; display:block}
.card h3{margin:0 0 8px 0}
.card p{margin:0; color:#555; font-size:14px}
.buscador{background:white; padding:15px; border-radius:10px; margin-bottom:20px; display:flex; gap:10px}
.buscador input{flex:1; padding:12px; border:1px solid #ddd; border-radius:6px}
.btn{background:#2563eb; color:white; border:0; padding:12px 20px; border-radius:6px; cursor:pointer}
.footer{text-align:center; padding:20px; color:#666}
</style></head><body>

<div class="header">
<h1>Sistema de préstamo de equipo</h1>
<p>CECyTEC Campeche — Plantel Pomuch</p>
</div>

<div class="main">
<h2>1. Inicio / Menú</h2>
<p>Usuario: <b>Responsable del área</b></p>
<p>Selecciona el módulo que deseas utilizar.</p>

<div class="resumen">
<div class="caja-resumen"><b><?php echo $total; ?></b>Equipos registrados</div>
<div class="caja-resumen"><b><?php echo $disp; ?></b>Disponibles</div>
<div class="caja-resumen"><b><?php echo $pres; ?></b>Prestados</div>
</div>

<form class="buscador" action="equipos.php" method="get">
<input name="buscar" placeholder="Buscar equipo por inventario o nombre... Ej: EQ-001">
<button class="btn">Buscar</button>
</form>

<div class="grid">
<a class="card" href="equipos.php"><h3>Registrar equipo</h3><p>Dar de alta un equipo tecnológico.</p></a>
<a class="card" href="disponibilidad.php"><h3>Disponibilidad</h3><p>Consultar qué equipos pueden prestarse.</p></a>
<a class="card" href="prestamos.php"><h3>Registrar préstamo</h3><p>Asignar un equipo a un docente.</p></a>
<a class="card" href="prestamos.php"><h3>Consultar préstamos</h3><p>Revisar préstamos activos y sus detalles.</p></a>
<a class="card" href="prestamos.php"><h3>Devoluciones</h3><p>Registrar la entrega de un equipo.</p></a>
<a class="card" href="prestamos.php"><h3>Historial</h3><p>Consultar préstamos anteriores.</p></a>
</div>

</div>
<div class="footer">Sistema de préstamo de equipo tecnológico</div>
</body></html>
