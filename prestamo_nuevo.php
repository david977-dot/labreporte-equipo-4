<?php
require "config.php";
require "encabezado.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = (int)$_POST["usuario"];
    $equipo = (int)$_POST["equipo"];
    $fecha = str_replace("T"," ", $_POST["fecha"]);
    $prevista = $_POST["prevista"];
    $conn->begin_transaction();
    try {
        $q = $conn->prepare("INSERT INTO prestamos (ID_USUARIO, ID_EQUIPO, FECHA_PRESTAMO, FECHA_DEVOLUCION, ESTADO_PRESTAMO) VALUES (?,?,?,?,'Activo')");
        $q->bind_param("iiss", $usuario, $equipo, $fecha, $prevista);
        $q->execute();
        $q2 = $conn->prepare("UPDATE equipos SET ESTADO='Prestado' WHERE ID_EQUIPO=?");
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
$usuarios = $conn->query("SELECT ID_USUARIO, NOMBRE FROM usuarios ORDER BY NOMBRE")->fetch_all(MYSQLI_ASSOC);
$equipos = $conn->query("SELECT ID_EQUIPO, NOMBRE_EQUIPO FROM equipos WHERE ESTADO='Disponible' ORDER BY NOMBRE_EQUIPO")->fetch_all(MYSQLI_ASSOC);
?>
<section class="panel">
<h2>Registrar préstamo</h2>
<?php if($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
<div class="campo"><label>Docente *</label><select name="usuario" required><option value="">Seleccionar</option><?php foreach($usuarios as $u): ?><option value="<?=$u["ID_USUARIO"]?>"><?=htmlspecialchars($u["NOMBRE"])?></option><?php endforeach; ?></select></div>
<div class="campo"><label>Equipo disponible *</label><select name="equipo" required><option value="">Seleccionar</option><?php foreach($equipos as $e): ?><option value="<?=$e["ID_EQUIPO"]?>"><?=$e["ID_EQUIPO"]." - ".htmlspecialchars($e["NOMBRE_EQUIPO"])?></option><?php endforeach; ?></select></div>
<div class="campo"><label>Fecha y hora del préstamo *</label><input type="datetime-local" name="fecha" value="<?=date('Y-m-d\TH:i')?>" required></div>
<div class="campo"><label>Devolución prevista *</label><input type="date" name="prevista" required></div>
<p class="texto-ayuda">Solo aparecen equipos con estado Disponible.</p>
<div class="acciones"><button class="btn">Guardar préstamo</button><a class="btn btn-secundario" href="index.php">Cancelar</a></div>
</form>
</section>
<?php require "pie.php"; ?>
