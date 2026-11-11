<?php
require_once "config/conexion.php";
echo "Conexion exitosa con la DB";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LabReport | Inicio</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <!-- HEADER + NAV-->
    <header>
        <nav class="navbar bg-dark navbar-dark">
            <div class="container-fluid">
                <div>
                <img src="img/editar.png" alt="" class="img-logo">
                <a href="index.php" class="navbar-brand logo">
                    LabReport
                </a>
                </div>

                <span class="navbar-text text-white">
                    Laboratorio de computo
                </span>
            </div>

        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 sidebar p-3">
                <h6 class="text-secondary mb-3">
                    MENU
                </h6>
                <a href="index.php" class="activo">Inicio</a>
                <a href="reporte.php">Reportar falla</a>
                <a href="reportes.php"> Consultar reportes</a>
                <a href="nuevo_equipo.php"> Nuevo equipo</a>
                <a href="equipos.php"> Equipos</a>

            </aside>
            <main class="col-md-9 col-lg-|0 contenido">
                <header class="md-4">
                    <h1 class="h3">Panel principal</h1>
                    <p class="text-secondary">
                        Resumen de incidencias del laboratorio
                    </p>
                </header>

                <!--SECTION 1-->

                <section class="mb-4">
                    <div class="row g-3">


                       
                        <article class="col-md-4">
                            <div class="card shadow-sm tarjeta-resumen">
                                <div class="card-body">
                                    <p class="text-secondary">
                                        Reportadas
                                    </p>
                                    <p class="numero">
                                        8
                                    </p>
                                </div>
                            </div>
                        </article>
                                   
                        <article class="col-md-4">
                            <div class="card shadow-sm tarjeta-resumen">
                                <div class="card-body">
                                    <p class="text-secondary">
                                        En revision
                                    </p>
                                    <p class="numero">
                                        3
                                    </p>
                                </div>
                            </div>
                        </article>

                        <article class="col-md-4">
                            <div class="card shadow-sm tarjeta-resumen">
                                <div class="card-body">
                                    <p class="text-secondary">
                                        Resueltas
                                    </p>
                                    <p class="numero">
                                        15
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <!--SECTION 2-->
                <SECTION>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5 mb-3">
                                Reportes recientes
                            </h2>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Equipo</th>
                                            <th>Falla</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PC-03</td>
                                            <TD>No enciende</TD>
                                            <td>
                                                <span class="badge text-bg-danger">Reportada

                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PC-08</td>
                                            <td>Sin internet</td>
                                            <td>
                                                <span class="badge text-bg-warning">En revision

                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PC-12</td>
                                            <td>Falla monitor</td>
                                            <td>
                                                <span class="badge text-bg-success">Resuelto

                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </SECTION>
            </main>
        </div>
    </div>

    <footer class="text-center py-3 bg-white border-top">
        CECyTEC Plantel Pomuch | Tecnico en Programacion
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>