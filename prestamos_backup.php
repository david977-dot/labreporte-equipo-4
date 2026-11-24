<?php
require "config.php"; require "encabezado.php";
$buscar=trim($_GET["buscar"] ?? ""); $estado=$_GET["estado"] ?? "Activos";
$sql="SELECT p.*,e.numero_inventario,e.nombre AS equipo FROM prestamos p JOIN equipos e ON e.id=p.equipo_id WHERE (p.docente LIKE ? OR e.nombre LIKE ? OR e.numero_inventario LIKE ?)";
$params=["%$buscar%","%$buscar%","%$buscar%"];
if($estado==="Activos"){$sql.=" AND p.estado='Activo'";} elseif($estado==="Devueltos"){$sql.=" AND p.estado='Devuelto'";}
$sql.=" ORDER BY p.id DESC";
$q=$conn->prepare($sql);$q->execute($params);$prestamos=$q->fetchAll();
?>
<section class="panel">
<h2>5. Consultar préstamos</h2>
<form method="get"><div class="fila">
<div class="campo"><label>Buscar</label><input name="buscar" value="<?=h($buscar)?>" placeholder="Docente o equipo"></div>
<div class="campo"><label>Estado</label><select name="estado"><?php foreach(["Activos","Devueltos","Todos"] as $op): ?><option <?=$estado===$op?"selected":""?>><?=$op?></option><?php endforeach; ?></select></div>
</div><div class="acciones"><button class="btn">Consultar</button><a class="btn btn-secundario" href="prestamos.php">Limpiar</a></div></form>
<table><tr><th>Docente</th><th>Equipo</th><th>Fecha préstamo</th><th>Devuelve</th><th>Estado</th></tr>
<?php foreach($prestamos as $p): ?><tr><td><?=h($p["docente"])?></td><td><?=h($p["numero_inventario"]." ".$p["equipo"])?></td><td><?=h($p["fecha_prestamo"])?></td><td><?=h($p["fecha_devolucion_prevista"])?></td><td><?=h($p["estado"])?></td></tr><?php endforeach; ?>
<?php if(!$prestamos): ?><tr><td colspan="5">No hay préstamos para mostrar.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
