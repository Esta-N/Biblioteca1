<?php 
    require_once('Libro.php');
    require_once('Socio.php');
    require_once('Prestamo.php');

    $Libro1 = new Libro("Esta", "David", "Gero", "Twenty");

    $Socio1 = new Socio("esta", "david1", "gero@gmail.com");

    $Prestamo1 = new Prestamo($Socio1, $Libro1, "1", "2");

    $LibroReal1 = new Libro("El Divino", "Los Therians", "2/2/1865", 420);

    $LibroReal2 = new Libro("El Dio", "Dio Brando", "13/03/1907", 1337);

    $LibroReal3 = new Libro("El Squirtle", "Esta-N", "27/02/1996", "cero cero 7");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <h1 class="h1">Libros</h1>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="img/libroN1.jpg" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Libro real #1</h5>
                        <p class="card-text">
                            <?php
                                echo "Titulo: " . $LibroReal1->mostrarTitulo() . "<br>";
                                echo "Autor: " . $LibroReal1->mostrarAutor() . "<br>";
                                echo "Fecha de publicacion: " . $LibroReal1->mostrarFecha() . "<br>";
                                echo "Cantidad de paginas: " . $LibroReal1->mostrarPaginas() . "<br>";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Libro</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/libroN2.png" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Libro real #2</h5>
                        <p class="card-text">
                            <?php
                                echo "Titulo: " . $LibroReal2->mostrarTitulo() . "<br>";
                                echo "Autor: " . $LibroReal2->mostrarAutor() . "<br>";
                                echo "Fecha de publicacion: " . $LibroReal2->mostrarFecha() . "<br>";
                                echo "Cantidad de paginas: " . $LibroReal2->mostrarPaginas() . "<br>";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Libro</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/libroN3.png" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Libro real #3</h5>
                        <p class="card-text">
                            <?php
                                echo "Titulo: " . $LibroReal3->mostrarTitulo() . "<br>";
                                echo "Autor: " . $LibroReal3->mostrarAutor() . "<br>";
                                echo "Fecha de publicacion: " . $LibroReal3->mostrarFecha() . "<br>";
                                echo "Cantidad de paginas: " . $LibroReal3->mostrarPaginas() . "<br>";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Libro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>