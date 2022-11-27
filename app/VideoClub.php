<?php

namespace ExamenServidorDespliegue\app;

use ExamenServidorDespliegue\util\ClienteNoEncontradoException;
use ExamenServidorDespliegue\util\CupoSuperadoException;
use ExamenServidorDespliegue\util\SoporteYaAlquiladoException;
use ExamenServidorDespliegue\util\SoporteNoEncontradoException;

include_once("./autoload.php");
include_once("Juego.php");
include_once("Disco.php");
include_once("CintaVideo.php");
include_once("Cliente.php");
    class VideoClub extends Soporte{

        private $productos = array();
        private int $numProductos=0;
        private $socios = array();
        private int $numSocios=0;
        private int $numProductosAlquilados;
        private int $numTotalAlquileres;

        function __construct(
            private string $nombre,
        ){

        }

        /**
         * Get the value of numProductosAlquilados
         */ 
        public function getNumProductosAlquilados()
        {
                return $this->numProductosAlquilados;
        }

        /**
         * Get the value of numTotalAlquileres
         */ 
        public function getNumTotalAlquileres()
        {
                return $this->numTotalAlquileres;
        }
        private function incluirProducto(Soporte $soporte){
            $this->productos[] = $soporte;
        }
        function incluirCintaVideo(string $tituto, int $precio, int $duracion){
            $cintaVideo = new CintaVideo($tituto, $this->numProductos, $precio,$duracion);
            $this -> numProductos++; 
            $this->incluirProducto($cintaVideo);
        }

        function incluirDVD(string $tituto, int $precio, string $idiomas, string $pantalla){
            $dvd = new Disco($tituto,$this->numProductos,$precio,$idiomas,$pantalla); 
            $this -> numProductos++; 
            $this->incluirProducto($dvd);
        }

        function incluirJuego(string $tituto, int $precio, string $consola, int $minJ, int $maxJ){
            $juego = new Juego($tituto,$this->numProductos,$precio,$consola, $minJ, $maxJ); 
            $this -> numProductos++;
            $this->incluirProducto($juego); 
        }
        function incluirSocio(string $nombre){
            $socio = new Cliente($nombre, $this->numSocios);
            $this -> numSocios++; 
            $this->socios[] = $socio;
        }
        function listarProductos(){
            echo "<br>";
            foreach ($this->productos as $key) {
                print_r($key);
                echo "<br>";
            }
        }
        function listarSocios(){
            echo "<br>";
            foreach ($this->socios as $key) {
                print_r($key);
                echo "<br>";
            }
        }
        public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte){
            $cliente = "";
            try {
                foreach ($this->socios as  $clientes) {
                    if ($clientes->getNumero() == $numeroCliente) {
                        $cliente = $clientes; 
                        try {
                            foreach ($this->productos as $producto) {
                                if ($producto->getNumero() == $numeroSoporte) {
                                    $clientes->alquilar($producto);
                                    return $this;
                                }
                            }
                        } catch (SoporteYaAlquiladoException $e) {
                            echo $e->getMessage();
                        } catch (CupoSuperadoException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                if ($cliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            }
            return $this;
        }

        public function alquilaSocioProductos(int $numeroSocio, array $numerosProductos){
            $cliente = "";
            try {
                foreach ($this->socios as  $objeto) {
                    if ($objeto->getNumero() == $numeroSocio) {
                        $cliente = $objeto; 
                        try {
                            foreach ($numerosProductos as $producto) {
                                if ($producto->alquilado) {
                                    throw new SoporteYaAlquiladoException();
                                }
                            }
                            foreach ($numerosProductos as $producto) {
                                $objeto->alquilar($producto);
                            }
                            return $this;
                        } catch (SoporteYaAlquiladoException $e) {
                            echo $e->getMessage();
                        } catch (CupoSuperadoException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                if ($cliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            }
            return $this;
        }

        public function devolverSocioProducto(int $numeroCliente, int $numeroSoporte)
        {
            $cliente = "";
            try {
                foreach ($this->socios as $objeto) {
                    if ($objeto->getNumero() == $numeroCliente) {
                        $cliente = $objeto;
                        try {
                            $objeto->devolver($numeroSoporte);
                        } catch (SoporteNoEncontradoException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                if ($cliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            }
            return $this;
        }

        public function devolverSocioProductos(int $numeroSocio, array $numerosProductos)
        {
            $saveCliente = "";
            try {
                foreach ($this->socios as $key => $obj) {
                    if ($obj->getNumero() == $numeroSocio) {
                        $saveCliente = $obj;
                        try {
                            foreach ($numerosProductos as $prod) {
                                if (!$obj->tieneAlquilado($prod)) {
                                    throw new SoporteNoEncontradoException();
                                }
                            }
                            foreach ($numerosProductos as $prod) {
                                $obj->devolver($prod->getNumero());
                            }
                            return $this;
                        } catch (SoporteNoEncontradoException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                if ($saveCliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            }
            return $this;
        }
    }
?>