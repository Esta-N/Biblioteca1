<?php
    class Socio {
        public $nombre;
        public $numSocio;
        public $email;

        public function __construct($nombre, $numSocio, $email) {
            $this->nombre = $nombre;
            $this->numSocio = $numSocio;
            $this->email = $email;
        
        }
        public function mostrarNombre(){
            return $this->nombre;
        }
    
        public function mostrarNumeroSocio(){
            return $this->numSocio;
        }
    }
    #$Socio = new Socio("Esta", "David", "Gero");
    #echo $Socio->mostrarInfo();
?>