<?php require_once "funciones.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de préstamo de equipo</title>
<link rel="stylesheet" href="CSS/estilo.css?v=2">
</head>
<body>
<header class="encabezado">
    <div>
        <h1>Sistema de préstamo de equipo</h1>
        <p>CECyTEC Campeche — Plantel Pomuch</p>
    </div>
    

<?php
// BOTONES ARRIBA A LA DERECHA
$pag = basename($_SERVER['PHP_SELF']);
$map = [
  'index.php' => ['sig'=>'equipos.php', 'txt'=>'Registrar equipo →', 'ant'=>'historial.php', 'ant_txt'=>'← Historial'],
  'equipos.php' => ['sig'=>'disponibilidad.php', 'txt'=>'Disponibilidad →', 'ant'=>'index.php', 'ant_txt'=>'← Inicio'],
  'disponibilidad.php' => ['sig'=>'prestamo_nuevo.php', 'txt'=>'Registrar préstamo →', 'ant'=>'equipos.php', 'ant_txt'=>'← Registrar equipo'],
  'prestamo_nuevo.php' => ['sig'=>'prestamos.php', 'txt'=>'Consultar préstamos →', 'ant'=>'disponibilidad.php', 'ant_txt'=>'← Disponibilidad'],
  'prestamos.php' => ['sig'=>'devolucion.php', 'txt'=>'Devoluciones →', 'ant'=>'prestamo_nuevo.php', 'ant_txt'=>'← Registrar préstamo'],
  'devolucion.php' => ['sig'=>'historial.php', 'txt'=>'Historial →', 'ant'=>'prestamos.php', 'ant_txt'=>'← Consultar préstamos'],
  'historial.php' => ['sig'=>'index.php', 'txt'=>'Volver a Inicio →', 'ant'=>'devolucion.php', 'ant_txt'=>'← Devoluciones'],
];
$d = $map[$pag] ?? $map['index.php'];
?>
<div class="botones-arriba">
  <a href="<?php echo $d['ant']; ?>" class="btn-arriba btn-gris"><?php echo $d['ant_txt']; ?></a>
  <a href="<?php echo $d['sig']; ?>" class="btn-arriba"><?php echo $d['txt']; ?></a>
</div>
</header>










<main class="contenedor">
<?php mostrar_mensaje(); ?>