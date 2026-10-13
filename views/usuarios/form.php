<?php
$usuario = $usuario ?? null;
$nombreForm = $_POST['nombre'] ?? ($usuario ? $usuario->mostrarNombre() : '');
$numUsuarioForm = $_POST['num_usuario'] ?? ($usuario ? $usuario->mostrarNumeroUsuario() : '');
$emailForm = $_POST['email'] ?? ($usuario ? $usuario->mostrarEmail() : '');
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
  <h1><?= isset($usuario) ? 'Editar usuario' : 'Nuevo usuario' ?></h1>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
  <?php endif; ?>

  <form method="POST" action="/bob1/index.php?accion=<?= isset($usuario) ? 'editarUsuario' : 'crearUsuario' ?>">
    <?php if (isset($usuario)): ?>
      <input type="hidden" name="id" value="<?= $usuario->mostrarId() ?>">
    <?php endif; ?>

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input id="nombre" type="text" name="nombre" class="form-control" required maxlength="100"
             value="<?= htmlspecialchars($nombreForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <div class="mb-3">
      <label for="num_usuario" class="form-label">Número de Usuario</label>
      <input id="num_usuario" type="number" name="num_usuario" class="form-control" required min="1"
             value="<?= htmlspecialchars((string)$numUsuarioForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input id="email" type="email" name="email" class="form-control" required maxlength="150"
             value="<?= htmlspecialchars($emailForm, ENT_QUOTES, 'UTF-8') ?>">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?accion=listarUsuarios" class="btn btn-outline-secondary">Cancelar</a>
  </form>
</main>

<?php require __DIR__ . '/../footer.php'; ?>