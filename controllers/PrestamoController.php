<?php
require __DIR__ . '/../models/Prestamo.php';
require __DIR__ . '/../conexion.php';

function listarPrestamos() {
    global $pdo;
    $prestamos = Prestamo::listar($pdo);
    require __DIR__ . '/../views/prestamos/viewPrestamos.php';
}

function formCrearPrestamo() {
    global $pdo;
    $libros = Libro::listar($pdo);
    $socios = Socio::listar($pdo);
    require __DIR__ . '/../views/prestamos/form.php';
}

function crearPrestamo() {
    global $pdo;
    $socioId = filter_var($_POST['socio_id'] ?? '', FILTER_VALIDATE_INT);
    $libroId = filter_var($_POST['libro_id'] ?? '', FILTER_VALIDATE_INT);
    $fechaPrestamo = trim($_POST['fecha_prestamo'] ?? '');
    $fechaDevolucion = trim($_POST['fecha_devolucion'] ?? '');
    $libros = Libro::listar($pdo);
    $socios = Socio::listar($pdo);

    if (!prestamoDatosValidos($pdo, $socioId, $libroId, $fechaPrestamo, $fechaDevolucion)) {
        $error = 'Seleccioná un libro y un socio, e ingresá fechas válidas. La devolución no puede ser anterior al préstamo.';
        require __DIR__ . '/../views/prestamos/form.php';
        return;
    }

    Prestamo::crear($pdo, $socioId, $libroId, $fechaPrestamo, $fechaDevolucion);
    header('Location: index.php?accion=listarPrestamos');
    exit;
}

function formEditarPrestamo() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);
    $prestamo = Prestamo::buscarPorId($pdo, $id);

    if (!$prestamo) {
        http_response_code(404);
        echo 'Préstamo no encontrado';
        return;
    }

    $libros = Libro::listar($pdo);
    $socios = Socio::listar($pdo);
    require __DIR__ . '/../views/prestamos/form.php';
}

function editarPrestamo() {
    global $pdo;
    $id = (int)($_POST['id'] ?? 0);
    $prestamo = Prestamo::buscarPorId($pdo, $id);

    if (!$prestamo) {
        http_response_code(404);
        echo 'Préstamo no encontrado';
        return;
    }

    $socioId = filter_var($_POST['socio_id'] ?? '', FILTER_VALIDATE_INT);
    $libroId = filter_var($_POST['libro_id'] ?? '', FILTER_VALIDATE_INT);
    $fechaPrestamo = trim($_POST['fecha_prestamo'] ?? '');
    $fechaDevolucion = trim($_POST['fecha_devolucion'] ?? '');
    $libros = Libro::listar($pdo);
    $socios = Socio::listar($pdo);

    if (!prestamoDatosValidos($pdo, $socioId, $libroId, $fechaPrestamo, $fechaDevolucion)) {
        $error = 'Seleccioná un libro y un socio, e ingresá fechas válidas. La devolución no puede ser anterior al préstamo.';
        require __DIR__ . '/../views/prestamos/form.php';
        return;
    }

    Prestamo::editar($pdo, $id, $socioId, $libroId, $fechaPrestamo, $fechaDevolucion);
    header('Location: index.php?accion=listarPrestamos');
    exit;
}

function eliminarPrestamo() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);

    if ($id > 0) {
        Prestamo::eliminar($pdo, $id);
    }

    header('Location: index.php?accion=listarPrestamos');
    exit;
}

function prestamoDatosValidos($pdo, $socioId, $libroId, string $fechaPrestamo, string $fechaDevolucion): bool {
    return $socioId !== false && $socioId !== null && $socioId > 0
        && $libroId !== false && $libroId !== null && $libroId > 0
        && Socio::buscarPorId($pdo, $socioId) !== null
        && Libro::buscarPorId($pdo, $libroId) !== null
        && fechaPrestamoValida($fechaPrestamo)
        && fechaPrestamoValida($fechaDevolucion)
        && $fechaDevolucion >= $fechaPrestamo;
}

function fechaPrestamoValida(string $fecha): bool {
    $fechaParseada = DateTime::createFromFormat('!Y-m-d', $fecha);
    return $fechaParseada !== false && $fechaParseada->format('Y-m-d') === $fecha;
}