<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=biblioteca;charsetutf8mb4", "root",""
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOEException $e) {
    die("Error de conexion: " . $e->getMessage());
}