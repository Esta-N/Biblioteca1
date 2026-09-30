<?php 
$usuario1 = "vegeta";
$password1 = 777;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            if (($_POST['usuario'] == $usuario1) && ($_POST['password'] == $password1)) {
                $usuario = htmlspecialchars($_POST['usuario']);
                echo "Bienvenido, " . $usuario;
                header("Location: index.php");
            }
        } else {
            echo "Por favor, completa todos los campos.";
        }
    }
?>