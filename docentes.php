<?php
require "config.php";
require "encabezado.php";
$error="";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $nombre=trim($_POST["nombre"]??"");
    $correo=trim($_POST["correo"]??"");
    $telefono=trim($_POST["telefono"]??"");
    if($nombre){
        $stmt=$conn->prepare("INSERT INTO docentes (NOMBRE_DOCENTE, CORREO, TELEFONO) VALUES (?,?,?)");
        $stmt->bind_param("sss",$nombre,$correo,$telefono);
        if($stmt->execute()){ header("Location: docentes.php?guardado=1"); exit; }
        else{ $error="Error: ".$stmt->error; }
        $stmt->close();
    } else { $error="El nombre es obligatorio."; }
}
$docentes=$conn->query("SELECT * FROM docentes ORDER BY ID_DOCENTE ASC")->fetch_all(MYSQLI_ASSOC);
?>
<section class="panel">
<h2>Registrar docente</h2>
<?php if(isset($_GET["guardado"])) echo "<p>Docente guardado.</p>"; ?>
<?php if($error) echo "<p>$error</p>"; ?>
<form method="post">
<div class="campo"><label>Nombre *</label><input name="nombre" required placeholder="Ej: Prof. Juan Pérez"></div>
<div class="campo"><label>Correo</label><input name="correo" placeholder="Ej: juan@escuela.edu.mx"></div>
<div class="campo"><label>Teléfono</label><input name="telefono" placeholder="Ej: 9621234567"></div>
<div class="acciones"><button class="btn">Guardar</button><a class="btn btn-secundario" href="index.php">Cancelar</a></div>
</form>
<h3 style="margin-top:20px">Docentes registrados</h3>
<table class="tabla-equipos"><tr><th>#</th><th>Nombre</th><th>Correo</th><th>Teléfono</th></tr>
<?php $i=1; foreach($docentes as $d): ?><tr><td><?=$i++?></td><td><?=h($d["NOMBRE_DOCENTE"])?></td><td><?=h($d["CORREO"])?></td><td><?=h($d["TELEFONO"])?></td></tr><?php endforeach; ?>
<?php if(!$docentes): ?><tr><td colspan="4">No hay docentes registrados.</td></tr><?php endif; ?>
</table>
</section>
<?php require "pie.php"; ?>
