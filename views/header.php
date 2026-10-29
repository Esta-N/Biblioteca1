
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    <!-- Estilos propios -->
    <link rel="stylesheet" href="/bob1/style.css">

    <title>Biblioteca</title>
</head>

<body>

    <!-- Fondo animado compartido: una sola imagen -->
    <img
        class="Cascada"
        alt=""
        aria-hidden="true"
    >

    <!-- Encabezado y navegación -->
    <header class="encabezado">

        <nav class="navbar navbar-expand-lg navbar-dark navbar-biblioteca">

            <div class="container-fluid">

                <!-- Nombre de la biblioteca -->
                <a
                    class="navbar-brand marca-biblioteca"
                    href="/bob1/index.php"
                >
                    <span class="icono-biblioteca">📖</span>
                    Biblioteca
                </a>

                <!-- Botón para celulares -->
                <button
                    class="navbar-toggler boton-menu"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menuBiblioteca"
                    aria-controls="menuBiblioteca"
                    aria-expanded="false"
                    aria-label="Abrir menú"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Enlaces de navegación -->
                <div
                    class="collapse navbar-collapse"
                    id="menuBiblioteca"
                >

                    <ul class="navbar-nav ms-auto nav-links">

                        <li class="nav-item">
                            <a
                                class="nav-link boton-nav"
                                href="/bob1/index.php?accion=listar"
                            >
                                Libros
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link boton-nav"
                                href="/bob1/index.php?accion=listarSocios"
                            >
                                Socios
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link boton-nav"
                                href="/bob1/index.php?accion=listarUsuarios"
                            >
                                Usuarios
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link boton-nav"
                                href="/bob1/index.php?accion=listarPrestamos"
                            >
                                Préstamos
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>

    </header>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
    ></script>
</body>
</html>
