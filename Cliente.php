<?php
    class Cliente {
        private $soportesAlquilados = array();
        private int $numSoportesAlquilados;
        private int $maxAlquilerConcurrente = 3;

        function __construct(
            public string $nombre,
            private int $numero,
        ){

        }
        /**
         * Get the value of numSoportesAlquilados
         */ 
        public function getNumSoportesAlquilados()
        {
            return $this->numSoportesAlquilados;
        }
        /**
         * Get the value of num
         */ 
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * Set the value of num
         *
         * @return  self
         */ 
        public function setNumero($numero)
        {
            $this->numero = $numero;

            return $this;
        }

        function tieneAlquilado (Soporte $soporte):bool{
            if (in_array($soporte, $this->soportesAlquilados)) {
                return false;
            }else{
                return true;
            }
        }
   

        function alquilar (Soporte $soporte):bool{
            $this->numSoportesAlquilados = 0;
            foreach ($soporte as $pitumba) {
                if (($this->tieneAlquilado($soporte))&&$this->numSoportesAlquilados<$this->maxAlquilerConcurrente) {
                    $this->numSoportesAlquilados++;
                    $pitumba.array_push($this->soportesAlquilados);
                    echo "<br>Se ha alquilado " . $pitumba;
                    return true;
                }else{
                    echo "<br>No se ha podido alquilar " . $pitumba;
                    return false;
                }
            }
        }

        function devolver ($numSoportesAlquilados):bool{
                if ($numSoportesAlquilados>0) {
                $this->numSoportesAlquilados = 0;
                echo "Devolución de realizada con éxito<br>";
                return true;
            }else{
                echo "No se ha podido realizar la devolución.<br>";
                return false;
            }
        }

        function listaAlquileres(){
            for ($i=0; $i < count($this->soportesAlquilados); $i++) {
                if ($i != count($this->soportesAlquilados) - 1) {
                  echo $this->soportesAlquilados[$i] .  " , <br>" ;  
                }else{
                    echo $this->soportesAlquilados[$i];
                }
            }
        }
    }

?>