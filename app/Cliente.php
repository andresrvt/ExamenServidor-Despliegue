<?php

namespace ExamenServidorDespliegue\app;
include_once("./autoload.php");
    class Cliente {
        private $soportesAlquilados = array();
        private int $numSoportesAlquilados=0;
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
                return true;
            }else{
                return false;
            }
        }
   

        function alquilar (Soporte $soporte):bool{
            echo "<br>";
            if ((!$this->tieneAlquilado($soporte))&& ($this->numSoportesAlquilados < $this->maxAlquilerConcurrente)) {
                $this->numSoportesAlquilados++;
                $this->soportesAlquilados[] = $soporte;
                echo "Se ha alquilado correctamente";
                return true;
            }else{
                echo "No se ha podido alquilar";
                return false;
            }
        }

        function devolver (int $numSoportesAlquilados):bool{
            echo "<br>";
            foreach($this->soportesAlquilados as $pitumba => $key){
                if ($key->getNumero() == $numSoportesAlquilados) {
                    unset($this->soportesAlquilados[array_search($key,$this->soportesAlquilados)]);
                    echo "Devolución de realizada con éxito";
                    return true;
                }
            }
            echo "No se ha podido realizar la devolución.";
            return false;
        }

        function listaAlquileres(){
            echo "<br>";
            foreach ($this->soportesAlquilados as $pitumba=>$key) {
                print_r($key);
                echo "<br>";
            }
        }
    }

?>