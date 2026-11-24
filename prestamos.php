<?php
require "config.php"; require "encabezado.php";
$buscar=trim($_GET["buscar"] ?? ""); $estado=$_GET["estado"] ?? "Activos";
$sql="SELECT p.*, u.NOMBRE AS docente, e.ID_EQUIPO AS numero_inventario,e.NOMBRE_EQUIPO AS equipo FROM prestamos p JOIN equipos e ON e.ID_EQUIPO=p.ID_EQUIPO LEFT JOIN usuarios u ON u.ID_USUARIO=p.ID_USUARIO WHERE (u.NOMBRE LIKE ? OR e.NOMBRE_EQUIPO LIKE ? OR e.ID_EQUIPO LIKE ?)";
$params=["%$buscar%","%$buscar%","%$buscar%"];
if($estado==="Activos"){$sql.=" AND p.ESTADO_PRESTAMO='Activo'";} elseif($estado==="Devueltos"){$sql.=" AND p.ESTADO_PRESTAMO='Devuelto'";}
$sql.=" ORDER BY p.ID_PRESTAMO DESC";
$q=$conn->prepare($sql);$q->execute($params);$prestamos=$q->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<section class="panel">
<h2>Consultar préstamos</h2>
<form method="get"><div class="fila">
<div class="campo"><label>Buscar</label><input name="buscar" value="<?=h($buscar)?>" placeholder="Docente o equipo"></div>
<div class="campo"><label>Estado</label><select name="estado"><?php foreach(["Activos","Devueltos","Todos"] as $op): ?><option <?=$estado===$op?"selected":""?>><?=$op?></option><?php endforeach; ?></select></div>
</div><div class="acciones"><button class="btn">Consultar</button><a class="btn btn-secundario" href="prestamos.php">Limpiar</a></div></form>
<style>
table{width:100%;border-collapse:collapse;margin-top:15px}
th,td{border:1px solid #ccc;padding:8px;text-align:left}
th{background:#f0f0f0}
</style>
<table><tr><th>Docente</th><th>Equipo</th><th>Fecha préstamo</th><th>Devuelve</th><th>Estado</th></tr>
<?php foreach($prestamos as $p): ?><tr><td><?=h($p["docente"])?></td><td><?=h($p["numero_inventario"]." ".$p["equipo"])?></td><td><?=h($p["FECHA_PRESTAMO"])?></td><td><?=h($p["FECHA_DEVOLUCION"])?></td><td><?=h($p["ESTADO_PRESTAMO"])?></td></tr><?php endforeach; ?>
<?php if(!$prestamos): ?><tr><td colspan="5">No hay préstamos para mostrar.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
