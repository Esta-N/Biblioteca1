<?php
require_once __DIR__ . '/Libro.php';
require_once __DIR__ . '/Socio.php';

class Prestamo {
    public ?int $id;
    public Socio $socio;
    public Libro $libro;
    public string $fechaPrestamo;
    public string $fechaDevolucion;

    public function __construct(Socio $socio, Libro $libro, string $fechaPrestamo, string $fechaDevolucion, ?int $id = null) {
        $this->id = $id;
        $this->socio = $socio;
        $this->libro = $libro;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function mostrarId() {
        return $this->id;
    }

    public function mostrarDetalles(): void {
        echo "Título: " . $this->libro->mostrarTitulo() . "<br>";
        echo "Autor: " . $this->libro->mostrarAutor() . "<br>";
        echo "Nombre: " . $this->socio->mostrarNombre() . "<br>";
        echo "Número de socio: " . $this->socio->mostrarNumeroSocio() . "<br>";
        echo "Préstamo: " . $this->fechaPrestamo . "<br>";
        echo "Devolución: " . $this->fechaDevolucion . "<br>";
    }

    public static function listar($pdo) {
        $sql = "SELECT p.id AS prestamo_id, p.fecha_prestamo, p.fecha_devolucion,
                       l.id AS libro_id, l.titulo, l.autor, l.anio_publicacion, l.cantidad_paginas,
                       s.id AS socio_id, s.nombre, s.num_socio, s.email
                FROM prestamos p
                INNER JOIN libros l ON l.id = p.libro_id
                INNER JOIN socios s ON s.id = p.socio_id
                ORDER BY p.fecha_prestamo DESC, p.id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $prestamos = [];

        foreach ($stmt->fetchAll() as $fila) {
            $libro = new Libro($fila['titulo'], $fila['autor'], $fila['anio_publicacion'], (int)$fila['cantidad_paginas'], (int)$fila['libro_id']);
            $socio = new Socio($fila['nombre'], (int)$fila['num_socio'], $fila['email'], (int)$fila['socio_id']);
            $prestamos[] = new Prestamo($socio, $libro, $fila['fecha_prestamo'], $fila['fecha_devolucion'], (int)$fila['prestamo_id']);
        }

        return $prestamos;
    }

    public static function buscarPorId($pdo, int $id) {
        $sql = "SELECT p.id AS prestamo_id, p.fecha_prestamo, p.fecha_devolucion,
                       l.id AS libro_id, l.titulo, l.autor, l.anio_publicacion, l.cantidad_paginas,
                       s.id AS socio_id, s.nombre, s.num_socio, s.email
                FROM prestamos p
                INNER JOIN libros l ON l.id = p.libro_id
                INNER JOIN socios s ON s.id = p.socio_id
                WHERE p.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch();

        if (!$fila) {
            return null;
        }

        $libro = new Libro($fila['titulo'], $fila['autor'], $fila['anio_publicacion'], (int)$fila['cantidad_paginas'], (int)$fila['libro_id']);
        $socio = new Socio($fila['nombre'], (int)$fila['num_socio'], $fila['email'], (int)$fila['socio_id']);
        return new Prestamo($socio, $libro, $fila['fecha_prestamo'], $fila['fecha_devolucion'], (int)$fila['prestamo_id']);
    }

    public static function crear($pdo, int $socioId, int $libroId, string $fechaPrestamo, string $fechaDevolucion) {
        $stmt = $pdo->prepare("INSERT INTO prestamos (socio_id, libro_id, fecha_prestamo, fecha_devolucion) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$socioId, $libroId, $fechaPrestamo, $fechaDevolucion]);
    }

    public static function editar($pdo, int $id, int $socioId, int $libroId, string $fechaPrestamo, string $fechaDevolucion) {
        $stmt = $pdo->prepare("UPDATE prestamos SET socio_id = ?, libro_id = ?, fecha_prestamo = ?, fecha_devolucion = ? WHERE id = ?");
        return $stmt->execute([$socioId, $libroId, $fechaPrestamo, $fechaDevolucion, $id]);
    }

    public static function eliminar($pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM prestamos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>