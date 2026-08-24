<?php
require __DIR__ . '../controllers/LibroController.php';

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
    case 'listar':
        listarLibros();
        break;
    case 'formCrear':
        require __DIR__ . '/views/form.php';
        break;
    case 'crear':
        crearLibro();
        break;
    case 'formEditar':
        formEditarLibro();
        break;
    case 'eliminar':
        eliminarLibro();
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada";
}
?>

<?php include('header.php'); ?>
    <h1 class="h1">Hola Causa</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="../img/books.jpg" class="card-img-top" alt="libros">
                    <div class="card-body">
                        <h5 class="card-title">Libros</h5>
                        <p class="card-text">Libros</p>
                        <a href="listado.php" class="btn btn-primary">Ver Libros</a>
                    </div>   
                </div>
            </div>
            
            <div class="col-4">
                <div class="card">
                    <img src="../img/socio.png" class="card-img-top" alt="libros">
                    <div class="card-body">
                        <h5 class="card-title">Socios</h5>
                        <p class="card-text">Socios</p>
                        <a href="viewSocios.php" class="btn btn-primary">Ver Socios</a>
                    </div>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card">
                    <img src="../img/prestamo.jpg" class="card-img-top" alt="libros">
                    <div class="card-body">
                        <h5 class="card-title">Prestamos</h5>
                        <p class="card-text">Prestamos</p>
                        <a href="viewPrestamos.php" class="btn btn-primary">Ver Prestamos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>