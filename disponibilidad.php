<?php
require "config.php";
require "encabezado.php";
$buscar = trim($_GET["buscar"] ?? "");
if ($buscar) {
    $stmt = $conn->prepare("SELECT * FROM equipos WHERE NOMBRE_EQUIPO LIKE ? ORDER BY ID_EQUIPO ASC");
    $like = "%$buscar%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $equipos = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    $equipos = $conn->query("SELECT * FROM equipos ORDER BY ID_EQUIPO ASC")->fetch_all(MYSQLI_ASSOC);
}
?>
<style>
.buscar{display:flex;gap:10px;margin:15px 0}
.buscar input{flex:1;padding:10px;border:1px solid #ddd;border-radius:6px}
.tabla{width:100%;border-collapse:collapse}
.tabla th,.tabla td{border:1px solid #ddd;padding:10px;text-align:left}
.tabla th{background:#f2f2f2}
.badge-disponible{background:#2ecc71;color:#fff;padding:4px 10px;border-radius:10px;font-size:13px}
.badge-prestado{background:#e74c3c;color:#fff;padding:4px 10px;border-radius:10px;font-size:13px}
.btn-prestamo{background:#2c7be5;color:#fff;padding:6px 12px;border-radius:6px;text-decoration:none;font-size:13px}
</style>
<section class="panel">
<h2>Disponibilidad</h2>
<form class="buscar" method="get">
<input name="buscar" value="<?=h($buscar)?>" placeholder="Buscar equipo...">
<button class="btn">Buscar</button>
</form>
<table class="tabla">
<tr><th>#</th><th>Equipo</th><th>Descripción</th><th>Estado</th><th>Acciones</th></tr>
<?php $i=1; foreach($equipos as $e): ?>
<tr>
<td><?=$i++?></td>
<td><?=h($e["NOMBRE_EQUIPO"])?></td>
<td><?=h($e["DESCRIPCION"])?></td>
<td>
<?php if($e["DISPONIBILIDAD"]==1): ?><span class="badge-disponible">Disponible</span>
<?php else: ?><span class="badge-prestado">Prestado</span><?php endif; ?>
</td>
<td><?php if($e["DISPONIBILIDAD"]==1): ?><a class="btn-prestamo" href="prestamos.php?equipo=<?=h($e["ID_EQUIPO"])?>">Prestar</a><?php else: ?>No disponible<?php endif; ?></td>
</tr>
<?php endforeach; ?>
<?php if(!$equipos): ?><tr><td colspan="5">No se encontró ningún equipo.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
