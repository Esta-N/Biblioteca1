<?php
$socio = $socio ?? null;
$nombreForm = $_POST['nombre'] ?? ($socio ? $socio->mostrarNombre() : '');
$numSocioForm = $_POST['num_socio'] ?? ($socio ? $socio->mostrarNumeroSocio() : '');
$emailForm = $_POST['email'] ?? ($socio ? $socio->mostrarEmail() : '');
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
  <h1><?= isset($socio) ? 'Editar socio' : 'Nuevo socio' ?></h1>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
  <?php endif; ?>

  <form method="POST" action="/bob1/index.php?accion=<?= isset($socio) ? 'editarSocio' : 'crearSocio' ?>">
    <?php if (isset($socio)): ?>
      <input type="hidden" name="id" value="<?= $socio->mostrarId() ?>">
    <?php endif; ?>

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input id="nombre" type="text" name="nombre" class="form-control" required maxlength="100"
             value="<?= htmlspecialchars($nombreForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <div class="mb-3">
      <label for="num_socio" class="form-label">Número de socio</label>
      <input id="num_socio" type="number" name="num_socio" class="form-control" required min="1"
             value="<?= htmlspecialchars((string)$numSocioForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input id="email" type="email" name="email" class="form-control" required maxlength="150"
             value="<?= htmlspecialchars($emailForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?accion=listarSocios" class="btn btn-outline-secondary">Cancelar</a>
  </form>
</main>

<?php require __DIR__ . '/../footer.php'; ?>