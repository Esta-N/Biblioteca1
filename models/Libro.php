<?php
    class Libro {
        private ?int $id;
        public string $titulo;
        public string $autor;
        public int $fechaPublicacion;
        public int $cantidadPaginas;

        public function __construct(string $titulo, string $autor, int $fechaPublicacion, int $cantidadPaginas, ?int $id = null) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->fechaPublicacion = $fechaPublicacion;
            $this->cantidadPaginas = $cantidadPaginas;
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
            return $this->fechaPublicacion;
        }

        public function mostrarPaginas() {
            return $this->cantidadPaginas;
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
        
            public static function crear($pdo, $titulo, $autor, $fechaPublicacion, $cantidadPaginas) {
                $stmt = $pdo->prepare(
                    "INSERT INTO libros (titulo, autor, imagen) VALUES (?, ?, ?)"
                );
                return $stmt->execute([$titulo, $autor, $fechaPublicacion, $cantidadPaginas]);
            }
        
            public static function actualizar($pdo, $id, $titulo, $autor, $fechaPublicacion, $cantidadPaginas) {
                $stmt = $pdo->prepare(
                    "UPDATE libros SET titulo=?, autor=?, imagen=?, fechaPublicacion=?, cantidadPaginas=? WHERE id=?"
                );
                return $stmt->execute(['id'], ['titulo'], ['autor'],['fechaPublicacion'],['cantidadPaginas']);
            }
        
            public static function eliminar($pdo, $id) {
                $stmt = $pdo->prepare("DELETE FROM libros WHERE id=?");
                return $stmt->execute([$id]);
            }
        
            public static function buscarPorId($pdo, $id) {
                $stmt = $pdo->prepare("SELECT * FROM libros WHERE id=?");
                $stmt->execute([$id]);
                $f = $stmt->fetch();
                return $f ? new Libro($f['id'], $f['titulo'], $f['autor'],$f['fechaPublicacion'],$f['cantidadPaginas']) : null;
            }
        }
?>