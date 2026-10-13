<?php
$prestamos = $prestamos ?? [];
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <h1 class="m-0">Préstamos</h1>
        <a href="/bob1/index.php?accion=formCrearPrestamo" class="btn btn-success">+ Nuevo préstamo</a>
    </div>

    <div class="row g-4">
        <?php foreach ($prestamos as $prestamo): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title"><?= htmlspecialchars($prestamo->libro->mostrarTitulo(), ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="card-text">
                            Autor: <?= htmlspecialchars($prestamo->libro->mostrarAutor(), ENT_QUOTES, 'UTF-8') ?><br>
                            Socio: <?= htmlspecialchars($prestamo->socio->mostrarNombre(), ENT_QUOTES, 'UTF-8') ?>
                            (#<?= htmlspecialchars((string)$prestamo->socio->mostrarNumeroSocio(), ENT_QUOTES, 'UTF-8') ?>)<br>
                            Préstamo: <?= htmlspecialchars($prestamo->fechaPrestamo, ENT_QUOTES, 'UTF-8') ?><br>
                            Devolución: <?= htmlspecialchars($prestamo->fechaDevolucion, ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="index.php?accion=formEditarPrestamo&id=<?= $prestamo->mostrarId() ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                            <a href="index.php?accion=eliminarPrestamo&id=<?= $prestamo->mostrarId() ?>"
                                 class="btn btn-sm btn-outline-danger"
                                 onclick="return confirm('¿Eliminar este préstamo?')">Eliminar</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>

        <?php if (count($prestamos) === 0): ?>
            <p class="text-muted">Todavía no hay préstamos registrados.</p>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/../footer.php'; ?>
