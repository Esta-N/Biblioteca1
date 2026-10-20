<?php

//Debug de imagenes
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
    exit;
}*/
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
    if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

        $extension  = strtolower(pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($extension, $permitidas)) {
            $errores[] = 'Solo se aceptan imágenes JPG, PNG o WEBP.';
        }
        
        elseif ($_FILES['portada']['size'] > 2 * 1024 * 1024) {
            $errores[] = 'La imagen no puede pesar más de 2 MB.';
        } else {
            $nombrePortada = uniqid('portada_') . '.' . $extension;

            if (!move_uploaded_file($_FILES['portada']['tmp_name'],
                                    'img/portadas/' . $nombrePortada)) {
                $errores[] = 'No se pudo guardar la imagen.';
                $nombrePortada = null;
            }
        }
    }
    if (empty($errores)) {
        Libro::crear($pdo, $titulo, $autor, (int)$anioPublicacion, (int)$cantidadPaginas, $nombrePortada ?? null);
        header('Location: index.php?accion=listar');
    }
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

    // Arranco asumiendo que sigue la de antes
        // 1) ¿Subió algo y salió bien?
    $nombrePortada = $_POST['portada_actual'] ?: null;
    if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

        // 2) ¿La extensión está permitida?
        $extension  = strtolower(pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($extension, $permitidas)) {
            $errores[] = 'Solo se aceptan imágenes JPG, PNG o WEBP.';
        }

        // 3) ¿No pesa demasiado?  2 MB = 2 * 1024 * 1024 bytes
        elseif ($_FILES['portada']['size'] > 2 * 1024 * 1024) {
            $errores[] = 'La imagen no puede pesar más de 2 MB.';
        } else {
            $nombrePortada = uniqid('portada_') . '.' . $extension;

            if (!move_uploaded_file($_FILES['portada']['tmp_name'],
                                    'img/portadas/' . $nombrePortada)) {
                $errores[] = 'No se pudo guardar la imagen.';
                $nombrePortada = null;
            }
        }
    }
    if (empty($errores)) {
    Libro::editar($pdo, $id, $titulo, $autor, (int)$anioPublicacion, (int)$cantidadPaginas, $nombrePortada ?? null);
    header('Location: index.php?accion=listar');
    }
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