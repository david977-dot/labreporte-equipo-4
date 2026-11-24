<?php include "config.php"; ?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Registrar equipo</title>
<style>
body{font-family:Arial; background:#f2f4f7; margin:0; padding:25px}
.caja{background:white; padding:25px; border-radius:10px; max-width:600px}
input,select{width:100%; padding:12px; margin:8px 0 18px 0; border:1px solid #ddd; border-radius:6px; box-sizing:border-box}
.btn-azul{background:#2563eb; color:white; border:0; padding:12px 20px; border-radius:8px; cursor:pointer}
.btn-gris{background:#eee; padding:12px 20px; border-radius:8px; text-decoration:none; color:#333}
table{width:100%; background:white; border-collapse:collapse; margin-top:25px; border-radius:8px; overflow:hidden}
th,td{padding:12px; text-align:left; border-bottom:1px solid #eee}
</style></head><body>

<div class="caja">
<h1>Registrar equipo</h1>
<form method="post">
<label>Codigo de Equipo *</label>
<input name="numero_inventario" placeholder="" required>

<label>Ubicacion *</label>
<input name="ubicacion" placeholder="" required>

<label>Estado</label>
<select name="estado"><option>Disponible</option><option>Prestado</option><option>En mantenimiento</option></select>

<button class="btn-azul" type="submit" name="guardar">Guardar</button>
<a class="btn-gris" href="equipos.php">Cancelar</a>
</form>
</div>

<h2>Equipos registrados</h2>
<table>
<tr><th>Codigo de Equipo</th><th>Ubicacion</th><th>Estado</th></tr>
<?php
$r = $conn->query("SELECT * FROM equipos ORDER BY numero_inventario");
while($e = $r->fetch_assoc()){
  echo "<tr><td>".$e['numero_inventario']."</td><td>".$e['ubicacion']."</td><td>".$e['estado']."</td></tr>";
}
?>
</table>

</body></html>

<?php
if(isset($_POST['guardar'])){
  $conn->query("INSERT INTO equipos (numero_inventario,ubicacion,estado) VALUES ('".$_POST['numero_inventario']."','".$_POST['ubicacion']."','".$_POST['estado']."')");
  echo "<script>location.href='registrar_equipo.php'</script>";
}
?>