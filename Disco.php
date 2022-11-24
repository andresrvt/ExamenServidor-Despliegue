<?php

include_once("Soporte.php");
    class Disco extends Soporte{


        public function __construct(
            string $titulo,
            int $numero,
            float $precio,
            public string $idiomas,
            private string $formatPantalla
        )
        {
            parent::__construct($titulo,$numero,$precio);
        }
        public function muestraResumen(){
            echo "<br>El idioma es: " . $this->idiomas . " y el formato de la pantalla es: " . $this->formatPantalla;
        }
    }    

?>