<?php require __DIR__ . '/../header.php'; ?>

<h1><?= isset($libro) ? 'Editar libro' : 'Nuevo libro' ?></h1>

<?php if (isset($error)): ?>
  <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="POST"
      action="index.php?accion=/* TODO: crear o editar, según corresponda */"
      enctype="multipart/form-data">

  <?php // TODO: si es edición, agregar un input hidden con el id del libro ?>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control"
           value="<?= /* TODO: precargar si hay $libro */ ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Autor</label>
    <input type="text" name="autor" class="form-control"
           value="<?= /* TODO */ ?>">
  </div>

  <?php // TODO: si es edición, mostrar la imagen actual antes del input file ?>
  <div class="mb-3">
    <label class="form-label">Portada</label>
    <input type="file" name="imagen" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require __DIR__ . '/../footer.php'; ?>