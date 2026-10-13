<?php
$usuarios = $usuarios ?? [];
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <h1 class="m-0">Nuestros usuarios</h1>
        <a href="/bob1/index.php?accion=formCrearUsuario" class="btn btn-success">+ Nuevo usuario</a>
    </div>

    <div class="row g-4">
        <?php foreach ($usuarios as $usuario): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card h-100">
                    <img src="img/socio.png" alt="" class="card-img-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="h5 card-title"><?= htmlspecialchars($usuario->mostrarNombre(), ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="card-text">
                            Número de usuario: <?= htmlspecialchars((string)$usuario->mostrarNumeroUsuario(), ENT_QUOTES, 'UTF-8') ?><br>
                            Email: <?= htmlspecialchars($usuario->mostrarEmail(), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="index.php?accion=formEditarUsuario&id=<?= $usuario->mostrarId() ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                            <a href="index.php?accion=eliminarUsuario&id=<?= $usuario->mostrarId() ?>"
                                 class="btn btn-sm btn-outline-danger"
                                 onclick="return confirm('¿Eliminar este Usuario?')">Eliminar</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>

        <?php if (count($usuarios) === 0): ?>
            <p class="text-muted">Todavía no hay Usuarios registrados.</p>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/../footer.php'; ?>
