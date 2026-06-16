<?php 
    require_once('Libro.php');
    require_once('Socio.php');
    require_once('Prestamo.php');

    #$Libro1 = new Libro("Esta", "David", "Gero", "Twenty");

    #$Socio1 = new Socio("esta", "david1", "gero@gmail.com");

    #$Prestamo1 = new Prestamo($Socio1, $Libro1, "1", "2");

    $SocioReal1 = new Socio("Goku", 1337, "kakaroto@gmail.com");
    $SocioReal2 = new Socio("Vegeta", 420, "principe@planetavegeta.com");
    $SocioReal3 = new Socio("Mahoraga", 69, "Adaptable@capsulecorp.com");
?>



    <?php include('header.php'); ?>

    <h1 class="h1 mt-4 text-center">Nuestros Socios</h1>

    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="img/Socio1.jpeg" alt="Socio 1" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Socio #1</h5>
                        <p class="card-text">
                            <?php
                                 echo "Nombre: " . $SocioReal1->nombre . "<br>";

                                 echo "Email: " . $SocioReal1->email . "<br>";
                     ?>
                </p>
                        <a href="#" class="btn btn-primary">Ver Perfil</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/Socio2.jpeg" alt="Socio 2" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Socio #2</h5>
                    <?php
                                 echo "Nombre: " . $SocioReal2->nombre . "<br>";
                                 
                                 echo "Email: " . $SocioReal2->email . "<br>";
                     ?>
                </p>
                        <a href="#" class="btn btn-primary">Ver Perfil</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="img/Socio3.jpeg" alt="Socio 3" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Socio #3</h5>
                        <p class="card-text">
                 <?php
                                 echo "Nombre: " . $SocioReal3->nombre . "<br>";
                                 
                                 echo "Email: " . $SocioReal3->email . "<br>";
                     ?>
                </p>
                        <a href="#" class="btn btn-primary">Ver Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
