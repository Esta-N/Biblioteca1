<?php
require __DIR__ . '/../models/Socio.php';
require __DIR__ . '/../conexion.php';

function listarSocios() {
    global $pdo;
    $socios = Socio::listar($pdo);
    require __DIR__ . '/../views/socios/viewSocios.php';
}

function formCrearSocio() {
    require __DIR__ . '/../views/socios/form.php';
}

function crearSocio() {
    global $pdo;

    $nombre = trim($_POST['nombre'] ?? '');
    $numSocio = filter_var($_POST['num_socio'] ?? '', FILTER_VALIDATE_INT);
    $email = trim($_POST['email'] ?? '');

    if ($nombre === '' || $numSocio === false || $numSocio === null || $numSocio <= 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingresá un nombre, un número de socio válido y un email válido.';
        require __DIR__ . '/../views/socios/form.php';
        return;
    }

    Socio::crear($pdo, $nombre, $numSocio, $email);
    header('Location: index.php?accion=listarSocios');
    exit;
}

function formEditarSocio() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);
    $socio = Socio::buscarPorId($pdo, $id);

    if (!$socio) {
        http_response_code(404);
        echo 'Socio no encontrado';
        return;
    }

    require __DIR__ . '/../views/socios/form.php';
}

function editarSocio() {
    global $pdo;

    $id = (int)($_POST['id'] ?? 0);
    $nombre = trim($_POST['nombre'] ?? '');
    $numSocio = filter_var($_POST['num_socio'] ?? '', FILTER_VALIDATE_INT);
    $email = trim($_POST['email'] ?? '');
    $socio = Socio::buscarPorId($pdo, $id);

    if (!$socio) {
        http_response_code(404);
        echo 'Socio no encontrado';
        return;
    }

    if ($nombre === '' || $numSocio === false || $numSocio === null || $numSocio <= 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingresá un nombre, un número de socio válido y un email válido.';
        require __DIR__ . '/../views/socios/form.php';
        return;
    }

    Socio::editar($pdo, $id, $nombre, $numSocio, $email);
    header('Location: index.php?accion=listarSocios');
    exit;
}

function eliminarSocio() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);

    if ($id > 0) {
        Socio::eliminar($pdo, $id);
    }

    header('Location: index.php?accion=listarSocios');
    exit;
}