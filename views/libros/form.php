<?php require __DIR__ . '/../header.php'; ?>

<h1><?= isset($libro) ? 'Editar libro' : 'Nuevo libro' ?></h1>

<?php if (isset($error)): ?>
  <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php
//  echo "<pre>";
//  var_dump($libro);
//  echo "</pre>";
?>

<form method="POST" action="index.php?accion=<?= isset($libro) ? 'formEditar' : 'formCrear' ?>" enctype="multipart/form-data">

  <?php // TODO: si es edición, agregar un input hidden con el id del libro = hecho? ?>

  <input type="hidden" name="id" value="<?= $libro->mostrarId()?>">

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="<?=$libro->mostrarTitulo()?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Autor</label>
    <input type="text" name="autor" class="form-control" value="<?=$libro->mostrarAutor()?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha De Publicacion</label>
    <input type="text" name="anio_publicacion" class="form-control" value="<?=$libro->mostrarFecha()?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha De Publicacion</label>
    <input type="text" name="cantidad_paginas" class="form-control" value="<?=$libro->mostrarPaginas()?>">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require __DIR__ . '/../footer.php'; ?>