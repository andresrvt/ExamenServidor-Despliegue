<?php
include_once("Soporte.php");
include_once("Cliente.php");
    class VideoClub extends Soporte{

        private $productos = array();
        private int $numProductos;
        private $socios = array();
        private int $numSocios;

        function __construct(
            private string $nombre,
        ){

        }

        private function incluirProducto(Soporte $soporte){
            $this->productos[] = $soporte
        }
        function incluirCintaVideo(string $tituto, int $precio, int $duracion){
            $cintVideo = new CintaVideo($tituto, $this->numProductos, $precio,$duracion);
            $this -> numProductos++; 
        }

        function incluirDVD(string $tituto, int $precio, string $idiomas, string $pantalla){
            $dvd = new Disco($tituto,$this->numProductos,$precio,$idiomas,$pantalla); 
            $this -> numProductos++; 
        }

        function incluirJuego(string $tituto, int $precio, string $consola, int $minJ, int $maxJ){
            $cintVideo = new Juego($tituto,$this->numProductos,$precio,$consola, $minJ, $maxJ); 
            $this -> numProductos++; 
        }
        function incluirSocio(string $nombre, int $maxAlquileresConcurrente = 3){
            $socio = new Cliente($nombre, $this->numSocios);
            $this -> numSocios++; 
        }
        function listarProductos(){
            for ($i=0; $i < count($this->productos); $i++) {
                if ($i != count($this->productos) - 1) {
                  echo $this->productos[$i] .  " , <br>" ;  
                }else{
                    echo $this->productos[$i];
                }
            }
        }
        function listarSocios(){
            for ($i=0; $i < count($this->productos); $i++) {
                if ($i != count($this->productos) - 1) {
                  echo $this->productos[$i] .  " , <br>" ;  
                }else{
                    echo $this->productos[$i];
                }
            }
        }

        function alquilarSocioProducto(int $numProductos, int $numSocios){

        }
    }
?>