<?php
require __DIR__ . '/../models/Libro.php';
require __DIR__ . '/../conexion.php'; // expone $pdo

function listarLibros() {
    global $pdo;
    $libros = Libro::listar($pdo);
    require __DIR__ . '/../views/libros/listado.php';
}

function formCrearLibro() {
    require __DIR__ . '/../views/libros/form.php';
}

function crearLibro() {
    global $pdo;

    $titulo = trim($_POST['titulo'] ?? '');
    $autor  = trim($_POST['autor'] ?? '');
    $anioPublicacion = trim($_POST['anio_publicacion'] ?? '');
    $cantidadPaginas = trim($_POST['cantidad_paginas'] ?? '');

    if ($titulo === '' || $autor === '' || $anioPublicacion === '' || $cantidadPaginas === '') {
        $error = "Todos los campos son obligatorios";
        require __DIR__ . '/../views/libros/form.php';
        return;
    }

    Libro::crear($pdo, $titulo, $autor, (int)$anioPublicacion, (int)$cantidadPaginas);
    header('Location: index.php?accion=listar');
    exit;
}

function editar() {
    global $pdo;

    $id = (int)($_POST['id'] ?? 0);
    $titulo = trim($_POST['titulo'] ?? '');
    $autor  = trim($_POST['autor'] ?? '');
    $anioPublicacion = trim($_POST['anio_publicacion'] ?? '');
    $cantidadPaginas = trim($_POST['cantidad_paginas'] ?? '');

    if ($id <= 0 || $titulo === '' || $autor === '' || $anioPublicacion === '' || $cantidadPaginas === '') {
        $error = "Todos los campos son obligatorios";
        $libro = Libro::buscarPorId($pdo, $id);
        require __DIR__ . '/../views/libros/form.php';
        return;
    }

    Libro::editar($pdo, $id, $titulo, $autor, (int)$anioPublicacion, (int)$cantidadPaginas);
    header('Location: index.php?accion=listar');
    exit;
}

function formEditarLibro() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);
    $libro = Libro::buscarPorId($pdo, $id);
    require __DIR__ . '/../views/libros/form.php';
}

function eliminarLibro() {
    global $pdo;
    $id = (int)($_GET['id'] ?? 0);
    Libro::eliminar($pdo, $id);
    header('Location: index.php?accion=listar');
    exit;
}
?>