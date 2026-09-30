<?php
require 'conexion.php';
require 'models/Libro.php';

// ─── Momento 2: llegó el formulario con los cambios ───
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id      = (int)($_POST['id'] ?? 0);
    $titulo  = trim($_POST['titulo'] ?? '');
    $autor   = trim($_POST['autor'] ?? '');
    $anio    = $_POST['anio_publicacion'] ?? '';
    $paginas = $_POST['cantidad_paginas'] ?? '';

    if ($titulo !== '' && $autor !== '' && $anio !== '' && $paginas !== '') {

        // El objeto con los datos NUEVOS (este sí conoce su id)
        $libro = new Libro($titulo, $autor, (int)$anio, (int)$paginas, $id);

        $stmt = $pdo->prepare(
            "UPDATE libros
             SET titulo = ?, autor = ?, anio_publicacion = ?, cantidad_paginas = ?
             WHERE id = ?"
        );
        $stmt->execute([
            $libro->mostrarTitulo(),
            $libro->mostrarAutor(),
            $libro->mostrarFecha(),
            $libro->mostrarPaginas(),
            $libro->mostrarId()
        ]);

        header("Location: listado.php");
        exit;
    }
    $error = "Todos los campos son obligatorios.";
}

// ─── Momento 1: traer el libro para precargar el form ───
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM libros WHERE id = ?");
$stmt->execute([$id]);
$fila = $stmt->fetch(PDO::FETCH_ASSOC);   // fetch (sin All): UNA fila

if (!$fila) {
    die("El libro no existe.");
}

// La fila se convierte en objeto: el formulario trabaja con él
$libro = new Libro(
    $fila['titulo'],
    $fila['autor'],
    $fila['anio_publicacion'],
    $fila['cantidad_paginas'],
    $fila['id']
);

require 'views/header.php';
?>

<div class="mx-auto" style="max-width: 600px;">
    <h1 class="h3 mb-4">✏️ Editar libro</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="editar.php" method="POST" class="card shadow-sm p-4 bg-white">

        <!-- el id viaja escondido: el UPDATE necesita saber QUÉ libro tocar -->
        <input type="hidden" name="id" value="<?= $libro->mostrarId() ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título *</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                   required maxlength="150"
                   value="<?= htmlspecialchars($libro->mostrarTitulo()) ?>">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor *</label>
            <input type="text" class="form-control" id="autor" name="autor"
                   required maxlength="100"
                   value="<?= htmlspecialchars($libro->mostrarAutor()) ?>">
        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label for="anio_publicacion" class="form-label">Año de publicación *</label>
                <input type="number" class="form-control"
                       id="anio_publicacion" name="anio_publicacion"
                       required min="0" max="2100"
                       value="<?= $libro->mostrarFecha() ?>">
            </div>
            <div class="col-6 mb-3">
                <label for="cantidad_paginas" class="form-label">Cantidad de páginas *</label>
                <input type="number" class="form-control"
                       id="cantidad_paginas" name="cantidad_paginas"
                       required min="1"
                       value="<?= $libro->mostrarPaginas() ?>">
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="listado.php" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require 'views/footer.php'; ?>