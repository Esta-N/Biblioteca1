<?php
$prestamo = $prestamo ?? null;
$libros = $libros ?? [];
$socios = $socios ?? [];
$socioSeleccionado = $_POST['socio_id'] ?? ($prestamo ? $prestamo->socio->mostrarId() : '');
$libroSeleccionado = $_POST['libro_id'] ?? ($prestamo ? $prestamo->libro->mostrarId() : '');
$fechaPrestamoForm = $_POST['fecha_prestamo'] ?? ($prestamo ? $prestamo->fechaPrestamo : '');
$fechaDevolucionForm = $_POST['fecha_devolucion'] ?? ($prestamo ? $prestamo->fechaDevolucion : '');
require __DIR__ . '/../header.php';
?>

<main class="container py-4">
  <h1><?= $prestamo ? 'Editar préstamo' : 'Nuevo préstamo' ?></h1>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
  <?php endif; ?>

  <?php if (count($libros) === 0 || count($socios) === 0): ?>
    <div class="alert alert-warning" role="alert">
      Para registrar un préstamo necesitás al menos un libro y un socio.
      <a href="index.php?accion=listar">Ir a libros</a> |
      <a href="index.php?accion=listarSocios">Ir a socios</a>
    </div>
  <?php else: ?>
    <form method="POST" action="/bob1/index.php?accion=<?= $prestamo ? 'editarPrestamo' : 'crearPrestamo' ?>">
      <?php if ($prestamo): ?>
        <input type="hidden" name="id" value="<?= $prestamo->mostrarId() ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label for="socio_id" class="form-label">Socio</label>
        <select id="socio_id" name="socio_id" class="form-select" required>
          <option value="">Seleccioná un socio</option>
          <?php foreach ($socios as $socio): ?>
            <option value="<?= $socio->mostrarId() ?>" <?= (string)$socioSeleccionado === (string)$socio->mostrarId() ? 'selected' : '' ?>>
              <?= htmlspecialchars($socio->mostrarNombre() . ' (#' . $socio->mostrarNumeroSocio() . ')', ENT_QUOTES, 'UTF-8') ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="libro_id" class="form-label">Libro</label>
        <select id="libro_id" name="libro_id" class="form-select" required>
          <option value="">Seleccioná un libro</option>
          <?php foreach ($libros as $libro): ?>
            <option value="<?= $libro->mostrarId() ?>" <?= (string)$libroSeleccionado === (string)$libro->mostrarId() ? 'selected' : '' ?>>
              <?= htmlspecialchars($libro->mostrarTitulo() . ' - ' . $libro->mostrarAutor(), ENT_QUOTES, 'UTF-8') ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="fecha_prestamo" class="form-label">Fecha del préstamo</label>
        <input id="fecha_prestamo" type="date" name="fecha_prestamo" class="form-control" required
               value="<?= htmlspecialchars($fechaPrestamoForm, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <div class="mb-3">
        <label for="fecha_devolucion" class="form-label">Fecha de devolución</label>
        <input id="fecha_devolucion" type="date" name="fecha_devolucion" class="form-control" required
               min="<?= htmlspecialchars($fechaPrestamoForm, ENT_QUOTES, 'UTF-8') ?>"
               value="<?= htmlspecialchars($fechaDevolucionForm, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="index.php?accion=listarPrestamos" class="btn btn-outline-secondary">Cancelar</a>
    </form>
  <?php endif; ?>
</main>

<?php require __DIR__ . '/../footer.php'; ?>