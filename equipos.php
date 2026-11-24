<?php
require "config.php";
require "encabezado.php";
$error = "";
if (isset($_GET["eliminar"])) {
    $id = (int)$_GET["eliminar"];
    $stmt = $conn->prepare("DELETE FROM equipos WHERE ID_EQUIPO=?");
    $stmt->bind_param("i", $id);
    $stmt->execute(); $stmt->close();
    header("Location: equipos.php?eliminado=1"); exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");
    if ($nombre) {
        $stmt = $conn->prepare("INSERT INTO equipos (NOMBRE_EQUIPO, DESCRIPCION, ESTADO, DISPONIBILIDAD) VALUES (?, ?, 'Disponible', 1)");
        $stmt->bind_param("ss", $nombre, $descripcion);
        if ($stmt->execute()) { header("Location: equipos.php?guardado=1"); exit; }
        else { $error = "Error al guardar: ".$stmt->error; }
        $stmt->close();
    } else { $error = "El nombre es obligatorio."; }
}
$equipos = $conn->query("SELECT * FROM equipos ORDER BY ID_EQUIPO DESC")->fetch_all(MYSQLI_ASSOC);
?>
<style>
.tabla-equipos{width:100%;border-collapse:collapse;margin-top:10px}
.tabla-equipos th,.tabla-equipos td{border:1px solid #ddd;padding:8px;text-align:left;vertical-align:top}
.tabla-equipos th{background:#f2f2f2}
.tabla-equipos td:nth-child(1){width:50px}
.tabla-equipos td:nth-child(2){width:28%}
.tabla-equipos td:nth-child(4){width:110px}
.btn-eliminar{background:#e74c3c;color:#fff;padding:5px 10px;border-radius:5px;text-decoration:none;font-size:13px}
</style>
<section class="panel">
<h2>Registrar equipo</h2>
<?php if(isset($_GET["guardado"])) echo "<p>Equipo guardado.</p>"; ?>
<?php if(isset($_GET["eliminado"])) echo "<p>Equipo eliminado.</p>"; ?>
<?php if($error) echo "<p>$error</p>"; ?>
<form method="post">
<div class="campo"><label>Nombre *</label><input name="nombre" required placeholder="Ej: Proyector Epson"></div>
<div class="campo"><label>Descripción</label><textarea name="descripcion" placeholder="Ej: Proyector PowerLite X49, con cable HDMI"></textarea></div>
<div class="acciones"><button class="btn">Guardar</button><a class="btn btn-secundario" href="index.php">Cancelar</a></div>
</form>
<h3 style="margin-top:20px">Equipos registrados</h3>
<table class="tabla-equipos"><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Estado</th><th>Acción</th></tr>
<?php foreach($equipos as $e): ?><tr><td><?=h($e["ID_EQUIPO"])?></td><td><?=h($e["NOMBRE_EQUIPO"])?></td><td><?=h($e["DESCRIPCION"])?></td><td><?=h($e["ESTADO"])?></td><td><a class="btn-eliminar" href="equipos.php?eliminar=<?=h($e["ID_EQUIPO"])?>" onclick="return confirm('¿Borrar este equipo?')">Eliminar</a></td></tr><?php endforeach; ?>
<?php if(!$equipos): ?><tr><td colspan="5">No hay equipos registrados.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
