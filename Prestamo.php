<?php
    class Prestamo {
        public Socio $socio;
        public Libro $libro;
        public $fechaPrestamo;
        public $fechaDevolucion;

        public function __construct(Socio $socio, Libro $libro, $fechaPrestamo, $fechaDevolucion) {
            $this->socio = $socio;
            $this->libro = $libro;
            $this->fechaPrestamo = $fechaPrestamo;
            $this->fechaDevolucion = $fechaDevolucion;
        }
        public function mostrarDetalles(): void {
            echo "~ ~ ~ ~ ~ ~ ~ < O > ~ ~ ~ ~ ~ ~ ~<br>";
            echo "|----Dettales Del Prestamo----| <br>";
            echo "~ ~ ~ ~ ~ ~ ~ < O > ~ ~ ~ ~ ~ ~ ~ <br>";
            echo "Titulo: " . $this->libro->mostrarTitulo() . "<br>";
            echo "Autor: " . $this->libro->mostrarAutor() . "<br>";
            echo "Fecha de Publicacion: " . $this->libro->mostrarFecha() . "<br>";
            echo "Cantidad de Paginas: " . $this->libro->mostrarPaginas() . "<br>";
            echo "~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ <br>";
            echo "Nombre: " . $this->socio->mostrarNombre() . "<br>";
            echo "Numero: " . $this->socio->mostrarNumeroSocio() . "<br>";
            echo " Prestamo: $this->fechaPrestamo " . "<br>";
            echo " Devolucion: $this->fechaDevolucion " . "<br>";              
        }
    }
?>