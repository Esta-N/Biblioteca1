<?php
require __DIR__ . '/../models/Usuario.php';
require __DIR__ . '/../conexion.php';

function listarUsuarios() {
    global $pdo;
    $usuarios = Usuario::listar($pdo);
    require __DIR__ . '/../views/usuarios/ViewUsuarios.php';
}

function formCrearUsuario() {
    require __DIR__ . '/../views/usuarios/form.php';
}

function crearUsuario() {
    global $pdo;

    $nombre = trim($_POST['nombre'] ?? '');
    $numUsuario = filter_var($_POST['num_usuario'] ?? '', FILTER_VALIDATE_INT);
    $email = trim($_POST['email'] ?? '');

    if ($nombre === '' || $numUsuario === false || $numUsuario === null || $numUsuario <= 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingresá un nombre, un número de Usuario válido y un email válido.';
        require __DIR__ . '/../views/usuarios/form.php';
        return;
    }

    Usuario::crear($pdo, $nombre, $numUsuario, $email);
    header('Location: index.php?accion=listarUsuarios');
    exit;
}

function formEditarUsuario() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);
    $usuario = Usuario::buscarPorId($pdo, $id);

    if (!$usuario) {
        http_response_code(404);
        echo 'Usuario no encontrado';
        return;
    }

    require __DIR__ . '/../views/usuarios/form.php';
}

function editarUsuario() {
    global $pdo;

    $id = (int)($_POST['id'] ?? 0);
    $nombre = trim($_POST['nombre'] ?? '');
    $numUsuario = filter_var($_POST['num_usuario'] ?? '', FILTER_VALIDATE_INT);
    $email = trim($_POST['email'] ?? '');
    $usuario = Usuario::buscarPorId($pdo, $id);

    if (!$usuario) {
        http_response_code(404);
        echo 'Usuario no encontrado';
        return;
    }

    if ($nombre === '' || $numUsuario === false || $numUsuario === null || $numUsuario <= 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingresá un nombre, un número de Usuario válido y un email válido.';
        require __DIR__ . '/../views/usuarios/form.php';
        return;
    }

    Usuario::editar($pdo, $id, $nombre, $numUsuario, $email);
    header('Location: index.php?accion=listarUsuarios');
    exit;
}

function eliminarUsuario() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);

    if ($id > 0) {
        Usuario::eliminar($pdo, $id);
    }

    header('Location: index.php?accion=listarUsuarios');
    exit;
}