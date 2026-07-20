<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=biblioteca;charsetutf8mb4", "root",""
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRNIRE_EXEPTION);

} catch (PDOEException $e) {
    die("Error de conexion: " . $e->getMessage());
}