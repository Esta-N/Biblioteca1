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

        public function mostrarInfo() {
            return "El nombre es: " . $this->nombre . "<br>" . "El numSocio es: " . $this->numSocio . "<br>" . "La email es: " . $this->email;
        }
    }
    #$Socio = new Socio("Esta", "David", "Gero");
    #echo $Socio->mostrarInfo();
?>