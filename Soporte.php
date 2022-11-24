<?php
    class Soporte{

        public function __construct(
            public string $titulo,
            protected int $numero,
            private float $precio
        ) {
        }


        public const IVA = 0.21;

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        function getPrecioConIva():float{
            $precioIva =$this->precio + $this->precio * $this::IVA;
            return $precioIva;
        }
        /**
         * Get the value of numero
         */ 
        public function getNumero()
        {
                return $this->numero;
        }

        public function muestraResumen(){
            echo "<br>El título es: " . $this->titulo . ", el número es: " . $this->getNumero() . ", el precio sin IVA es: " . $this->getPrecio() . " y el precio con IVA incluido es: " . $this->getPrecioConIva();
        }
    }
?>