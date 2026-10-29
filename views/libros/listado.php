<?php
require __DIR__ . '/../header.php';
// Carga el encabezado, el fondo y los estilos.
?>

<h1 class="mb-4">Catálogo de libros</h1>

<div class="catalogo">
    <?php foreach ($libros as $libro): ?>

        <?php
        // Obtenemos la portada del libro actual.
        $portada = $libro->mostrarPortada();

        // Comprobamos que la portada tenga un nombre válido.
        $rutaPortada = !empty($portada)
            ? __DIR__ . '/../../img/portadas/' . basename($portada)
            : null;

        // Si la imagen existe, la usamos como fondo de la tarjeta.
        $estiloPortada = ($rutaPortada && is_file($rutaPortada))
            ? "background-image: url('/bob1/img/portadas/"
                . rawurlencode(basename($portada)) . "');"
            : "";
        ?>

        <div
            class="tarjeta tarjeta-libro"
            style="<?= htmlspecialchars($estiloPortada, ENT_QUOTES, 'UTF-8') ?>"
        >
            <div class="contenido-tarjeta">

                <h3>
                    <?= htmlspecialchars($libro->mostrarTitulo()) ?>
                </h3>

                <p>
                    <strong>Autor:</strong>
                    <?= htmlspecialchars($libro->mostrarAutor()) ?>
                </p>

                <p>
                    <strong>Año:</strong>
                    <?= htmlspecialchars((string) $libro->mostrarFecha()) ?>
                </p>

                <p>
                    <strong>Páginas:</strong>
                    <?= htmlspecialchars((string) $libro->mostrarPaginas()) ?>
                </p>

                <a
                    href="index.php?accion=formEditar&id=<?= urlencode((string) $libro->mostrarId()) ?>"
                    class="btn btn-sm btn-primary"
                >
                    Editar
                </a>

                <a
                    href="index.php?accion=eliminar&id=<?= urlencode((string) $libro->mostrarId()) ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Seguro que querés eliminar este libro?')"
                >
                    Eliminar
                </a>

            </div>
        </div>

    <?php endforeach; ?>
</div>

<?php if (count($libros) === 0): ?>
    <p class="text-muted mt-3">
        No hay libros cargados todavía.
    </p>
<?php endif; ?>

<div class="mt-4">
    <a href="index.php?accion=formCrear" class="btn btn-success">
        + Nuevo libro
    </a>
</div>

<?php
require __DIR__ . '/../footer.php';
?>