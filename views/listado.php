<?php
require __DIR__ . '/header.php';
?>

<div class="d-flex flex-column align-items-center gap-3 mb-4">
    <h1 class="h3 m-0">Listado de libros</h1>
</div>

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
                   onclick="return confirm('¿Eliminar «<?= htmlspecialchars($libro->mostrarTitulo()) ?>»? No hay vuelta atrás.')">
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
<div class="d-flex flex-column align-items-center gap-3 mb-4">
    <a href="crear.php" class="btn btn-success">+ Nuevo libro</a>
</div>
<?php require __DIR__ . '/footer.php'; ?>
