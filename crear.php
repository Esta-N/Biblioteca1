<?php
require 'conexion.php';
require 'Libro.php';

// ¿Llegó el formulario enviado?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo  = trim($_POST['titulo'] ?? '');
    $autor   = trim($_POST['autor'] ?? '');
    $anio    = $_POST['anio_publicacion'] ?? '';
    $paginas = $_POST['cantidad_paginas'] ?? '';

    if ($titulo !== '' && $autor !== '' && $anio !== '' && $paginas !== '') {

        // 1) Con los datos del formulario nace un objeto Libro
        //    (sin id: todavía no está en la base)
        $libro = new Libro($titulo, $autor, (int)$anio, (int)$paginas);

        // 2) El objeto alimenta el INSERT a través de sus getters
        $stmt = $pdo->prepare(
            "INSERT INTO libros (titulo, autor, anio_publicacion, cantidad_paginas)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([
            $libro->mostrarTitulo(),
            $libro->mostrarAutor(),
            $libro->mostrarFecha(),
            $libro->mostrarPaginas()
        ]);

        // 3) Listo: volvemos al listado
        header("Location: listado.php");
        exit;
    }
    $error = "Todos los campos son obligatorios.";
}

require 'header.php';
?>

<div class="mx-auto" style="max-width: 600px;">
    <h1 class="h3 mb-4">📕 Nuevo libro</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="crear.php" method="POST" class="card shadow-sm p-4 bg-white">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título *</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                   required maxlength="150">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor *</label>
            <input type="text" class="form-control" id="autor" name="autor"
                   required maxlength="100">
        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label for="anio_publicacion" class="form-label">Año de publicación *</label>
                <input type="number" class="form-control"
                       id="anio_publicacion" name="anio_publicacion"
                       required min="0" max="2100">
            </div>
            <div class="col-6 mb-3">
                <label for="cantidad_paginas" class="form-label">Cantidad de páginas *</label>
                <input type="number" class="form-control"
                       id="cantidad_paginas" name="cantidad_paginas"
                       required min="1">
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Crear libro</button>
            <a href="listado.php" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require 'footer.php'; ?>