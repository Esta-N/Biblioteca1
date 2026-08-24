<?php
    class Libro {
        private ?int $id;
        public $titulo;
        public $autor;
        public $fechaPublicacion;
        public $cantidadPaginas;

        public function __construct($titulo, $autor, $fechaPublicacion, $cantidadPaginas, ?int $id = null) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->fecha = $fechaPublicacion;
            $this->paginas = $cantidadPaginas;
        }
        public function mostrarId() {
            return $this->id;
        }

        public function mostrarTitulo() {
            return $this->titulo;
        }

        public function mostrarAutor() {
            return $this->autor;
        }

        public function mostrarFecha() {
            return $this->fecha;
        }

        public function mostrarPaginas() {
            return $this->paginas;
        }
    // Metodos nuevos
            public static function listar($pdo) {
                $stmt = $pdo->prepare("SELECT * FROM libros ORDER BY titulo");
                $stmt->execute();
                $filas = $stmt->fetchAll();
        
                $libros = [];
                // echo '<pre>';
                // var_dump($filas);
                // echo '</pre>';
                foreach ($filas as $f) {
                    $libros[] = new Libro($f['titulo'], $f['autor'], $f['anio_publicacion'], $f['cantidad_paginas'], $f['id']);
                }
                return $libros;
            }
        
            public static function crear($pdo, $titulo, $autor, $fecha, $paginas) {
                $stmt = $pdo->prepare(
                    "INSERT INTO libros (titulo, autor, imagen) VALUES (?, ?, ?)"
                );
                return $stmt->execute([$titulo, $autor, $fecha, $paginas]);
            }
        
            public static function actualizar($pdo, $id, $titulo, $autor, $fecha, $paginas) {
                $stmt = $pdo->prepare(
                    "UPDATE libros SET titulo=?, autor=?, imagen=?, fecha=?, paginas=? WHERE id=?"
                );
                return $stmt->execute($f['id'], $f['titulo'], $f['autor'],$f['fecha'],$f['paginas']);
            }
        
            public static function eliminar($pdo, $id) {
                $stmt = $pdo->prepare("DELETE FROM libros WHERE id=?");
                return $stmt->execute([$id]);
            }
        
            public static function buscarPorId($pdo, $id) {
                $stmt = $pdo->prepare("SELECT * FROM libros WHERE id=?");
                $stmt->execute([$id]);
                $f = $stmt->fetch();
                return $f ? new Libro($f['id'], $f['titulo'], $f['autor'],$f['fecha'],$f['paginas']) : null;
            }
        }
?>