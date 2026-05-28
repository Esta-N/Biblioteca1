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

        public function mostrarInfo() {
            return "El titulo es: " . $this->titulo . "<br>" . "El autor es: " . $this->autor . "<br>" . "La fecha de publicacion es: " . $this->fecha . "<br>" . "La cantidad de paginas es: " . $this->paginas;
        }
    }

    $Libro = new Libro("Esta", "David", "Gero", "twenty");
    echo $Libro->mostrarInfo();
?>