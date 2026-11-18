<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Préstamo de Equipos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #eef2f7;
            min-height: 100vh;
        }

        .contenedor-login {
            max-width: 430px;
            width: 100%;
        }

        .encabezado {
            background: #173b63;
            color: white;
            padding: 25px;
            border-radius: 12px 12px 0 0;
            text-align: center;
        }

        .icono {
            font-size: 45px;
        }

        .formulario {
            background: white;
            padding: 30px;
            border-radius: 0 0 12px 12px;
        }

        .btn-ingresar {
            background: #173b63;
            color: white;
            width: 100%;
            padding: 11px;
        }

        .btn-ingresar:hover {
            background: #245783;
            color: white;
        }
    </style>

</head>

<body>

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div class="contenedor-login shadow">

            <!-- ENCABEZADO -->
            <div class="encabezado">

                <div class="icono">
                    <i class="bi bi-pc-display"></i>
                </div>

                <h1 class="h3 fw-bold">
                    Préstamo de Equipos
                </h1>

                <p class="mb-0">
                    Sistema de Gestión de Equipos Tecnológicos
                </p>

            </div>

            <!-- FORMULARIO -->
            <div class="formulario">

                <h2 class="h4 text-center mb-2">
                    Iniciar sesión
                </h2>

                <p class="text-secondary text-center mb-4">
                    Ingresa tus datos para continuar
                </p>

                <form action="validar_login.php" method="POST">

                    <!-- CORREO -->
                    <div class="mb-3">

                        <label for="correo" class="form-label">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            id="correo"
                            name="correo"
                            placeholder="Ingresa tu correo"
                            required
                        >

                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="mb-4">

                        <label for="contrasena" class="form-label">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            id="contrasena"
                            name="contrasena"
                            placeholder="Ingresa tu contraseña"
                            required
                        >

                    </div>

                    <!-- BOTON -->
                    <button type="submit" class="btn btn-ingresar">
                        Iniciar sesión
                    </button>

                </form>

                <hr class="my-4">

                <p class="text-center text-secondary small mb-0">
                    Sistema de Préstamo de Equipos Tecnológicos
                </p>

            </div>

        </div>

    </main>

</body>
</html>