<?php
    class Libro {
        public $titulo;
        public $autor;
        public $fechaPublicacion;
        public $cantidadPaginas;

        public function __construct($titulo, $autor, $fechaPublicacion, $cantidadPaginas) {
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->fecha = $fechaPublicacion;
            $this->paginas = $cantidadPaginas;
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
    }
    #$Libro = new Libro("Esta", "David", "Gero", "twenty");
    #echo $Libro->mostrarInfo();
?>