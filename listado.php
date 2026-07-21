<?php
require 'conexion.php';
require 'Libro.php';

// 1) Pedimos las filas a MySQL
$stmt  = $pdo->query("SELECT * FROM libro ORDER BY titulo");
$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2) Convertimos cada fila (array) en un objeto Libro
$libros = [];
foreach ($filas as $fila) {
    $libros[] = new Libro(
        $fila['titulo'],
        $fila['autor'],
        $fila['fecha_publicacion'],
        $fila['cantidad_paginas'],
        $fila['id']
    );
}
// A partir de acá: solo objetos. Los arrays quedaron atrás.

require 'header.php';
?>

<h1 class="h3 mb-4">Listado de libros</h1>

<table class="table table-striped table-hover align-middle bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Páginas</th>
            <th class="text-end">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?= htmlspecialchars($libro->mostrarTitulo()) ?></td>
            <td><?= htmlspecialchars($libro->mostrarAutor()) ?></td>
            <td><?= $libro->mostrarFecha() ?></td>
            <td><?= $libro->mostrarPaginas() ?></td>
            <td class="text-end">
                <a href="editar.php?id=<?= $libro->mostrarId() ?>"
                   class="btn btn-sm btn-outline-primary">Editar</a>
                <a href="eliminar.php?id=<?= $libro->mostrarId() ?>"
                   class="btn btn-sm btn-outline-danger"
                   onclick="return confirm('¿Eliminar «<?= htmlspecialchars($libro->getTitulo()) ?>»? No hay vuelta atrás.')">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php if (count($libros) === 0): ?>
        <tr>
            <td colspan="5" class="text-center text-muted py-4">
                No hay libros cargados todavía. ¡Agregá el primero!
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>