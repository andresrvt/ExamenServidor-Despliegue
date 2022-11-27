<?php

namespace ExamenServidorDespliegue\app;
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

        function __construct(
            private string $nombre,
        ){

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
        function alquilaSocioProducto(int $numProductos, int $numSocios){
            foreach($this->socios as $value){
                if ($value->getNumero() == $numSocios) {
                    foreach($this->productos as $key){
                        if ($key->getNumero() == $numProductos) {
                            $value->alquilar($key);
                        }
                    }
                }
            }
        }
    }
?>