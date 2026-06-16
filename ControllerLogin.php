<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = htmlspecialchars($_POST['usuario']);
            echo "Bienvenido, " . $usuario;
            header("Location: index.php");
        } else {
            echo "Por favor, completa todos los campos.";
        }
    }
?>