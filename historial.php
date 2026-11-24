<?php
require "config.php";
require "encabezado.php";
$desde = $_GET["desde"] ?? "";
$hasta = $_GET["hasta"] ?? "";
$buscar = trim($_GET["buscar"] ?? "");
$sql = "SELECT p.ID_PRESTAMO, p.FECHA_PRESTAMO, p.FECHA_DEVOLUCION, p.ESTADO_PRESTAMO, u.NOMBRE AS docente, e.NOMBRE_EQUIPO AS equipo FROM prestamos p JOIN usuarios u ON u.ID_USUARIO=p.ID_USUARIO JOIN equipos e ON e.ID_EQUIPO=p.ID_EQUIPO WHERE 1=1";
$tipos = ""; $params = [];
if ($buscar) { $sql .= " AND (u.NOMBRE LIKE ? OR e.NOMBRE_EQUIPO LIKE ?)"; $b = "%$buscar%"; $tipos .= "ss"; $params[] = $b; $params[] = $b; }
if ($desde) { $sql .= " AND DATE(p.FECHA_PRESTAMO) >= ?"; $tipos .= "s"; $params[] = $desde; }
if ($hasta) { $sql .= " AND DATE(p.FECHA_PRESTAMO) <= ?"; $tipos .= "s"; $params[] = $hasta; }
$sql .= " ORDER BY p.FECHA_PRESTAMO DESC";
$q = $conn->prepare($sql);
if ($params) $q->bind_param($tipos, ...$params);
$q->execute();
$historial = $q->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<section class="panel">
<h2>Historial</h2>
<form method="get"><div class="fila">
<div class="campo"><label>Desde</label><input type="date" name="desde" value="<?=h($desde)?>"></div>
<div class="campo"><label>Hasta</label><input type="date" name="hasta" value="<?=h($hasta)?>"></div>
<div class="campo"><label>Equipo / docente</label><input name="buscar" value="<?=h($buscar)?>" placeholder="Buscar"></div>
</div><div class="acciones"><button class="btn">Consultar</button><a class="btn btn-secundario" href="historial.php">Limpiar</a></div></form>
<style>
table{width:100%;border-collapse:collapse;margin-top:15px}
th,td{border:1px solid #ccc;padding:8px;text-align:left;white-space:nowrap}
th{background:#f0f0f0}
</style>
<table><tr><th>Fecha</th><th>Equipo</th><th>Docente</th><th>Devolución real</th><th>Estado</th></tr>
<?php foreach($historial as $p): ?><tr><td><?=h($p["FECHA_PRESTAMO"])?></td><td><?=h($p["equipo"])?></td><td><?=h($p["docente"])?></td><td><?=h($p["FECHA_DEVOLUCION"] ?: "Pendiente")?></td><td><?=h($p["ESTADO_PRESTAMO"])?></td></tr><?php endforeach; ?>
<?php if(!$historial): ?><tr><td colspan="5">No hay registros en el historial.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
