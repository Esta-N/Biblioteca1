<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=biblioteca;charset=utf8mb4", "root","1234"
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOEException $e) {
    die("Error de conexion: " . $e->getMessage());
}
