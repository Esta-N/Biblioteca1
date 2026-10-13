<?php
$socios = $socios ?? [];
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <h1 class="m-0">Nuestros socios</h1>
        <a href="/bob1/index.php?accion=formCrearSocio" class="btn btn-success">+ Nuevo socio</a>
    </div>

    <div class="row g-4">
        <?php foreach ($socios as $socio): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card h-100">
                    <img src="img/socio.png" alt="" class="card-img-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="h5 card-title"><?= htmlspecialchars($socio->mostrarNombre(), ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="card-text">
                            Número de socio: <?= htmlspecialchars((string)$socio->mostrarNumeroSocio(), ENT_QUOTES, 'UTF-8') ?><br>
                            Email: <?= htmlspecialchars($socio->mostrarEmail(), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="index.php?accion=formEditarSocio&id=<?= $socio->mostrarId() ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                            <a href="index.php?accion=eliminarSocio&id=<?= $socio->mostrarId() ?>"
                                 class="btn btn-sm btn-outline-danger"
                                 onclick="return confirm('¿Eliminar este socio?')">Eliminar</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>

        <?php if (count($socios) === 0): ?>
            <p class="text-muted">Todavía no hay socios registrados.</p>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/../footer.php'; ?>
