<?php 
$usuario1 = "vegeta";
$password1 = 777;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['usuario']) && !empty($_POST['password']) && 'usuario' == $usuario1 && 'password' == $password1) {
            $usuario = htmlspecialchars($_POST['usuario']);
            echo "Bienvenido, " . $usuario;
            header("Location: index.php");
        } else {
            echo "Por favor, completa todos los campos.";
        }
    }
?>