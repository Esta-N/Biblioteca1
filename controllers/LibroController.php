<?php
require __DIR__ . '/../models/Libro.php';
require __DIR__ . '/../conexion.php'; // expone $pdo

function listarLibros() {
    global $pdo;
    $libros = Libro::listar($pdo);
    require __DIR__ . '/../views/libros/listado.php';
}

function crearLibro() {
    global $pdo;

    $titulo = trim($_POST['titulo'] ?? '');
    $autor  = trim($_POST['autor'] ?? '');
    $fechaPublicacion  = trim($_POST['fecha'] ?? '');
    $cantidadPaginas  = trim($_POST['paginas'] ?? '');

    if ($titulo === '' || $autor === '' || $fechaPublicacion === '' || $cantidadPaginas === '') {
        $error = "Todos los campos son obligatorios";
        require __DIR__ . '/../views/form.php';
        return;
    }

    Libro::crear($pdo, $titulo, $autor, $fechaPublicacion, $cantidadPaginas);
    header('Location: index.php?accion=listar');
}

function editar() {
    global $pdo;

    $titulo = trim($_POST['titulo'] ?? '');
    $autor  = trim($_POST['autor'] ?? '');
    $fechaPublicacion  = trim($_POST['fecha'] ?? '');
    $cantidadPaginas  = trim($_POST['paginas'] ?? '');

    if ($titulo === '' || $autor === '' || $fechaPublicacion === '' || $cantidadPaginas === '') {
        $error = "Todos los campos son obligatorios";
        require __DIR__ . '/../views/form.php';
        return;
    }

    Libro::editar($pdo, $id, $titulo, $autor, $fechaPublicacion, $cantidadPaginas);
    header('Location: index.php?accion=listar');
}

function formEditarLibro() {
    global $pdo;
    $libro = Libro::buscarPorId($pdo, $_GET['id']);
    require __DIR__ . '/../views/libros/form.php';
}

function eliminarLibro() {
    global $pdo;
    Libro::eliminar($pdo, $_GET['id']);
    header('Location: index.php?accion=listar');
}
?>