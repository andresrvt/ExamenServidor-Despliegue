<?php 

namespace ExamenServidorDespliegue\app;
include_once("./autoload.php");

namespace ExamenServidorDespliegue\app;

// No es necesario que los hijos de Soporte implementen a Resumible debido a que con el include heredan todo lo del padre, es decir, taambién imlpementan esta clase.
interface Resumible{
    public function muestraResumen();
}

?>