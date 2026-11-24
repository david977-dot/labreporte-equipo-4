<?php
require "config.php";
require "encabezado.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prestamo = (int)$_POST["prestamo"];
    $fecha = $_POST["fecha"];
    $conn->begin_transaction();
    try {
        $r = $conn->query("SELECT ID_EQUIPO FROM prestamos WHERE ID_PRESTAMO=$prestamo");
        $fila = $r->fetch_assoc();
        $equipo = (int)$fila["ID_EQUIPO"];
        $q = $conn->prepare("UPDATE prestamos SET ESTADO_PRESTAMO='Devuelto', FECHA_DEVOLUCION=? WHERE ID_PRESTAMO=?");
        $q->bind_param("si", $fecha, $prestamo);
        $q->execute();
        $q2 = $conn->prepare("UPDATE equipos SET ESTADO='Disponible' WHERE ID_EQUIPO=?");
        $q2->bind_param("i", $equipo);
        $q2->execute();
        $conn->commit();
        header("Location: prestamos.php");
        exit;
    } catch (Exception $e) {
        $conn->rollback();
        $mensaje = "Error: ".$e->getMessage();
    }
}
$activos = $conn->query("SELECT p.ID_PRESTAMO, u.NOMBRE, e.NOMBRE_EQUIPO FROM prestamos p JOIN usuarios u ON u.ID_USUARIO=p.ID_USUARIO JOIN equipos e ON e.ID_EQUIPO=p.ID_EQUIPO WHERE p.ESTADO_PRESTAMO='Activo' ORDER BY p.ID_PRESTAMO DESC")->fetch_all(MYSQLI_ASSOC);
?>
<section class="panel">
<h2>Registrar devolución</h2>
<?php if($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
<div class="campo"><label>Préstamo activo *</label><select name="prestamo" required><option value="">Seleccionar</option><?php foreach($activos as $p): ?><option value="<?=$p["ID_PRESTAMO"]?>"><?=htmlspecialchars($p["NOMBRE"])." - ".htmlspecialchars($p["NOMBRE_EQUIPO"])?></option><?php endforeach; ?></select></div>
<div class="campo"><label>Fecha de devolución *</label><input type="date" name="fecha" value="<?=date('Y-m-d')?>" required></div>
<div class="campo"><label>Estado físico</label><select name="estado_fisico"><option>Buen estado</option><option>Con daños</option><option>Incompleto</option></select></div>
<div class="campo"><label>Observación</label><textarea name="observacion" placeholder="Describe alguna observación (opcional)"></textarea></div>
<div class="acciones"><button class="btn">Registrar devolución</button><a class="btn btn-secundario" href="index.php">Cancelar</a></div>
</form>
</section>
<?php require "pie.php"; ?>
