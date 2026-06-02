<?php
    class Prestamo {
        public Socio $socio;
        public Libro $sibro;
        public $fechaPrestamo;
        public $fechaDevolucion;

        public function __construct($socio, $libro, $fechaPrestamo, $fechaDevolucion) {
            $this->socio = $socio;
            $this->libro = $libro;
            $this->fechaPrestamo = $fechaPrestamo;
            $this->fechaDevolucion = $fechaDevolucion;
        }
        public function mostrarDetalles(): void {
            echo "~ ~ ~ ~ ~ ~ ~ <O> ~ ~ ~ ~ ~ ~ ~\n";
            echo "Dettales Del Prestamo\n";
            echo "~ ~ ~ ~ ~ ~ ~ <O> ~ ~ ~ ~ ~ ~ ~\n";
        }
    }
?>