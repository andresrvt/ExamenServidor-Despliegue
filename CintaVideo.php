<?php

include_once("Soporte.php");
    class CintaVideo extends Soporte{

        public function __construct(
            string $titulo,
            int $numero,
            float $precio,
            private int $duracion
        )
        {
            parent::__construct($titulo,$numero,$precio);
        }
        

        public function muestraResumen(){
            echo "<br>La cinta de video dura: " . $this->duracion . "min";
        }

    }    

?>