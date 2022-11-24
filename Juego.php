<?php
include_once("Soporte.php");
    class Juego extends Soporte{

        function __construct(
            string $titulo,
            int $numero,
            float $precio,
            public string $consola,
            private int $minNumJugadores,
            private int $maxNumJugadores
        )
        {
            parent::__construct($titulo,$numero,$precio);
        }

        function muestraJugadoresPosibles(){
            if ($this->minNumJugadores>0) {
                echo "El juego se puede jugar entre  " . $this->minNumJugadores . "-" . $this->maxNumJugadores . " jugadores.";
            } else {
                echo "El juego es de " . $this->maxNumJugadores . " jugadores.";
            }
        }

        public function muestraResumen(){
            echo "<br>El título es: " . $this->titulo . ", el número es: " . $this->numero . ", el precio sin IVA es: " . $this->getPrecio() . " y el precio con IVA incluido es: " . $this->getPrecioConIva()
            ;
        }

    }

?>