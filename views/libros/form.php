<?php require __DIR__ . '/../header.php'; ?>

<h1><?= isset($libro) ? 'Editar libro' : 'Nuevo libro' ?></h1>

<?php if (isset($error)): ?>
  <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="POST" action="index.php?accion=<?= isset($libro) ? 'editar' : 'crear' ?>" enctype="multipart/form-data">

  <?php if (isset($libro)): ?>
      <input type="hidden" name="id" value="<?= $libro->mostrarId() ?>">
  <?php endif; ?>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="<?= isset($libro) ? htmlspecialchars($libro->mostrarTitulo()) : '' ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Autor</label>
    <input type="text" name="autor" class="form-control" value="<?= isset($libro) ? htmlspecialchars($libro->mostrarAutor()) : '' ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Año de publicación</label>
    <input type="number" name="anio_publicacion" class="form-control" value="<?= isset($libro) ? htmlspecialchars($libro->mostrarFecha()) : '' ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Cantidad de páginas</label>
    <input type="number" name="cantidad_paginas" class="form-control" value="<?= isset($libro) ? htmlspecialchars($libro->mostrarPaginas()) : '' ?>">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require __DIR__ . '/../footer.php'; ?>