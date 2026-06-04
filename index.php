<?php 
    require_once('Libro.php');
    require_once('Socio.php');
    require_once('Prestamo.php');
     $Libro1 = new Libro("Esta", "David", "Gero", "Twenty");

        $Socio1 = new Socio("esta", "david1", "gero@gmail.com");

        $Prestamo1 = new Prestamo($Socio1, $Libro1, "1", "2");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Biblioteca</a>
            <div class="nav-links">
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link" href="indexLibros.php">Libros</a>
                </li>

                <li class="nav-item btn btn-secondary">
                    <a class="nav-link" href="indexPrestamos.php">Prestamos</a>
                </li>
                
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link" href="indexSocios.php">Socios</a>
                </li>
            </div>
        </div>
    </nav>
    <h1 class="h1">Hola Causa</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="img/books.jpg" class="card-img-top" alt="libros">
                    <div class="card-body">
                        <h5 class="card-title">Libros</h5>
                    <p class="card-text">Libros</p>
                    <a href="indexLibros.php" class="btn btn-primary">Ver Libros</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <img src="img/socio.png" class="card-img-top" alt="libros">
                <div class="card-body">
                    <h5 class="card-title">Socios</h5>
                    <p class="card-text">Socios</p>
                    <a href="indexSocios.php" class="btn btn-primary">Ver Socios</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <img src="img/prestamo.jpg" class="card-img-top" alt="libros">
                <div class="card-body">
                    <h5 class="card-title">Prestamos</h5>
                    <p class="card-text">Prestamos</p>
                    <a href="indexPrestamos.php" class="btn btn-primary">Ver Prestamos</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>