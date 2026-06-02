<?php 
    require_once('Libro.php');
    require_once('Socio.php');
    require_once('Prestamo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <h1 class="h1">Hola Causa</h1>
    <p class="p">
    <?php 
        $Libro1 = new Libro("Esta", "David", "Gero", "Twenty");

        $Socio1 = new Socio("esta", "david1", "gero@gmail.com");

        $Prestamo = new Prestamo($Socio1, $Libro1, "1", "2");
        echo "<br>";
        echo "<br>" . $Prestamo->mostrarDetalles();
    ?>
    </p>
</body>
</html>