<?php 
    require_once('Libro.php');
    require_once('Socio.php');
    require_once('Prestamo.php');

    #$Prestamo1 = new Prestamo($Socio1, $Libro1, "1", "2");

    $LibroReal1 = new Libro("El Divino", "Los Therians", "2/2/1865", 420);

    $LibroReal2 = new Libro("El Dio", "Dio Brando", "13/03/1907", 1337);

    $LibroReal3 = new Libro("El Squirtle", "Esta-N", "27/02/1996", "cero cero 7");

    $SocioReal1 = new Socio("Shakira", 69420, "female@gmail.com");

    $SocioReal2 = new Socio("Fabino", 42, "FaFa@gmail.com");

    $SocioReal3 = new Socio("martin", 1337, "martingames@gmail.com");

    $PrestamoReal1 = new Prestamo($SocioReal1, $LibroReal1, 2024, 2028);
?>



    <?php include('header.php'); ?>
    <h1 class="h1">Prestamos</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="img/libroN1.jpg" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Prestamo real #1</h5>
                        <p class="card-text">
                            <?php
                                echo "texto";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Prestamo</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/libroN2.png" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Prestamo real #2</h5>
                        <p class="card-text">
                            <?php
                                echo "texto";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Prestamo</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/libroN3.png" alt="Libro #1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Prestamo real #3</h5>
                        <p class="card-text">
                            <?php
                                echo "texto";
                            ?>
                        </p>
                        <a href="#" class="btn btn-primary">Ver Prestamo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
