<?php

declare(strict_types=1);


namespace ExamenServidorDespliegue\app;

use ExamenServidorDespliegue\util\CupoSuperadoException;
use ExamenServidorDespliegue\util\SoporteNoEncontradoException;
use ExamenServidorDespliegue\util\SoporteYaAlquiladoException;

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
                    throw new CupoSuperadoException();
                }
                    }else{
                        throw new SoporteYaAlquiladoException();
                    }
        }

        function devolver (int $numSoportesAlquilados){
            echo "<br>";
            foreach($this->soportesAlquilados as $objeto => $key){
                if ($key->getNumero() == $numSoportesAlquilados) {
                    unset($this->soportesAlquilados[array_search($key,$this->soportesAlquilados)]);
                    echo "Devolución de realizada con éxito";
                    $key->alquilado = false;
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