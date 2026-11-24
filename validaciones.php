<?php require "config.php"; require "encabezado.php"; ?>
<section class="panel">
<h2>8. Mensajes y validaciones</h2>
<div class="alerta error"><strong>⚠ Equipo no disponible</strong><br>El equipo seleccionado está prestado o no se encuentra disponible. Selecciona otro equipo disponible.</div>
<div class="alerta exito">✓ Préstamo registrado correctamente.</div>
<div class="alerta exito">✓ Devolución registrada correctamente.</div>
<div class="alerta aviso">Los campos marcados con * son obligatorios. Un equipo prestado no puede asignarse a otro préstamo hasta que se registre su devolución.</div>
<div class="acciones"><a class="btn" href="index.php">Aceptar / Volver al menú</a></div>
</section>
<?php require "pie.php"; ?>
