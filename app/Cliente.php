<?php

namespace ExamenServidorDespliegue\app;
use ExamenServidorDespliegue\util\CupoSuperadoException;
use ExamenServidorDespliegue\util\SoporteNoEncontradoException;
use ExamenServidorDespliegue\util\SoporteYaAlquiladoException;
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
   

        function alquilar (Soporte $soporte){
            echo "<br>";
            if ((!$this->tieneAlquilado($soporte))) {
                if ($this->numSoportesAlquilados < $this->maxAlquilerConcurrente) {
                    $this->numSoportesAlquilados++;
                    $this->soportesAlquilados[] = $soporte;
                    echo "Se ha alquilado correctamente";
                    
                $soporte -> alquilado = true;
                return $this;
                }else{
                    throw new CupoSuperadoException;
                }
            }else{
                throw new SoporteYaAlquiladoException;
            }
        }
        public function devolver(int $numSoporte){
            echo "<br>";
            foreach ($this->soportesAlquilados as $pitumba => $obj) {
                if ($obj->getNumero() == $numSoporte) {
                    echo "<br>El soporte estaba alquilado";
                    $this->numSoportesAlquilados--;
                    unset($this->soportesAlquilados[$pitumba]);
                    echo "<br>El soporte ha sido devuelto con éxito";
    
                    $obj->alquilado=false;
                    return $this;
                }
            }
            throw new SoporteNoEncontradoException();
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